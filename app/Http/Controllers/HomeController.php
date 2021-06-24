<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\User;
use App\Apartment;
use App\Sponsor;
Use App\Service;
use App\SponsoredApartment;
use Braintree;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('home');
    }
    public function dashboard($id) {
        $user= User::findOrFail($id);
        $apartments= Apartment::where('user_id', '=', $id) -> get();
        return view('pages.dashboard',compact('apartments','user'));
    }
    public function myapartment($id){
        $user = User::findOrFail($id);
        $apartments = Apartment::where('user_id','=',$id )
                    ->get();
        return view('pages.myapartment',compact('apartments', 'user'));
    }
    // nuovo appartamento
    public function add()
    {
        $services = Service::all();
        $sponsors = Sponsor::all();
        return view('pages.newapartment',compact('services','sponsors'));
    }
    public function add_function(Request $request)
    {
        $validated = $request -> validate([
            'title' => 'required|max:128|min:4',
            'number_rooms' => 'required|numeric',
            'number_toiletes' => 'required|numeric',
            'number_beds' => 'required|numeric',
            'area' => 'required|numeric',
            'address' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'cover_image' => 'nullable',
            'user_id' => 'required',
        ]);

        $service = Service::findOrFail($request -> get('service_id'));
        $apartment = Apartment::create($validated);        

        $img = $request -> file('cover_image');
        if ($img == !null) {
            $imgExt = $img -> getClientOriginalExtension();
            $newNameImg = time() . rand(1,1000) . $imgExt;
            $folder = '/apartment-img/';
            $imgFile = $img -> storeAs($folder , $newNameImg , 'public');
            $apartment -> img = $newNameImg;
        }

        $apartment->services()->attach($request-> get('service_id'));
        $apartment->save();
        return redirect()->route('homepage');
    }

    // edit apartment
    public function edit($id)
    {
        $apartment = Apartment::findOrFail($id);
        $services = Service::all();
        return view('pages.edit',compact('apartment','services'));
    }
    // update apartment
    public function edit_function(Request $request, $id)
    {
        $validated = $request -> validate([
            'title' => 'required|max:128|min:4',
            'number_rooms' => 'required|numeric',
            'number_toiletes' => 'required|numeric',
            'number_beds' => 'required|numeric',
            'area' => 'required|numeric',
            'address' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'user_id' => 'required',
        ]);
        
        $apartment = Apartment::findOrFail($id);
        $img = $request -> file('cover_image');
        if ($img == !null) {
            $imgExt = $img -> getClientOriginalExtension();
            $newNameImg = time() . rand(1,1000) . '.' . $imgExt;
            $folder = '/apartment-img/';
            $imgFile = $img -> storeAs($folder , $newNameImg , 'public');
            $apartment -> cover_image = $newNameImg;
        }

        $apartment->update($validated);
        $apartment->services()->sync($request-> get('service_id'));

        return redirect()->route('homepage');
    }

    // add sponsor
    public function sponsor_function(Request $request,$id)
    {
        $validated = $request -> validate([
            'sponsor_id' => 'required'
        ]);

        date_default_timezone_set('Europe/Rome');
        switch ($validated['sponsor_id']) {
            case 1:
                $afterDate = date('m/d/Y h:i:s a', time() + 86400);
                break;
            case 2:
                $afterDate = date('m/d/Y h:i:s a', time() + 259200);
                break;
            case 3:
                $afterDate = date('m/d/Y h:i:s a', time() + 604800);
                break;
        }
        $apartment = Apartment::findOrFail($id);
        $apartment->update($validated);
        $apartment->sponsors()
            ->attach($request-> get('sponsor_id'),
                [
                    'start_date' => date('m/d/Y h:i:s a', time()),
                    'expire_date' => $afterDate
                ]
            );

        return redirect()->route('homepage');
    }

    // softDeletes
    public function deleteApartment($id)
    {
        $apartment = Apartment::findOrFail($id);
        $apartment->delete();
        $apartment->save();
        return redirect()->route('homepage');
    }

    public function statistic($id){
        $statistic=DB::table('statistics')
                    ->join('apartments','statistics.apartment_id','=','apartments.id')
                    ->select('statistics.*','apartments.*')
                    ->where('statistics.apartment_id','=',$id)
                    ->get();
        //             dd(count($statistic));
        return view('pages.statistic',compact('statistic'));
    }

    // init braintree
    public function sponsor($id){
        $apartment = Apartment::findOrFail($id);
        $sponsors = Sponsor::all();

        // braintree 
        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $token = $gateway->ClientToken()->generate();


        return view('pages.sponsor',compact('sponsors','apartment','token'));
    }

    public function pay(Request $request,$userId)
    {
        $user = User::find($userId);
        // dd($user);
        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
    
        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;
        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName' => $user->firstname,
                'lastName' => $user->lastname,
                'email' => $user->email,
            ],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
    
        if ($result->success) {
            $transaction = $result->transaction;
            return back()->with('success_message', 'Transaction successful. The ID is:'. $transaction->id);
        } else {
            $errorString = "";
            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }
            return back()->withErrors('An error occurred with the message: '.$result->message);
        }
    }

} // END OF HomeController
