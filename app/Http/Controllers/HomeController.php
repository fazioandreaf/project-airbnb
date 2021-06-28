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
            'user_id' => 'required',
        ]);

        $service = Service::findOrFail($request -> get('service_id'));
        $apartment = Apartment::create($validated);

        $img = $request -> file('cover_image');
        if ($request->hasFile('cover_image')) {
            $imgExt = $img -> getClientOriginalExtension();
        }
        $newNameImg = time() . rand(1,1000) . '.' . $imgExt;
        $folder = '/assets/';
        $apartment -> cover_image = $newNameImg;
        $imgFile = $img -> storeAs($folder , $newNameImg , 'public');

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

        if ($request->hasFile('cover_image')) {
            $img = $request -> file('cover_image');
            $imgExt = $img -> getClientOriginalExtension();
            $newNameImg = time() . rand(1,1000) . '.' . $imgExt;
            $folder = '/assets/';
            $imgFile = $img -> storeAs($folder , $newNameImg , 'public');
            $apartment -> cover_image = $newNameImg;
        }

        $apartment->update($validated);
        $apartment->services()->sync($request-> get('service_id'));

        return redirect()->route('homepage');
    }

    // add sponsor
    public function sponsor_function($apartmentId,$sponsorId)
    {   
        $now = Carbon::now()->setTimeZone('Europe/Rome');
        $expire = Carbon::now()->setTimeZone("Europe/Rome");

        switch ($sponsorId) {
            case 1:
                $expire->modify('+24 hours');
                break;
            case 2:
                $expire->modify('+72 hours');
                break;
            case 3:
                $expire->modify('+144 hours');
                break;
        }

        $apartment = Apartment::findOrFail($apartmentId);
        $apartment->update([$apartmentId,$sponsorId]);
        $apartment->sponsors()
            ->attach($sponsorId,
                [
                    'start_date' => $now,
                    'expire_date' => $expire
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
        return view('pages.sponsor',compact('sponsors','apartment'));
    }
    // form braintree
    public function form_pay(Request $request)
    {
        $validated = $request -> validate([
            'apartment_id' => 'required',
            'sponsor_id' => 'required'
        ]);
        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
        // dd($validated);
        $token = $gateway->ClientToken()->generate();
        $apartment = Apartment::findOrFail($validated['apartment_id']);
        $sponsor = Sponsor::findOrFail($validated['sponsor_id']);
        $price = $sponsor->price / 100;
        // dd($apartment,$sponsor);
        return view('pages.pay',compact('apartment','sponsor','price','token'));
    }
    // checkout braintree
    public function pay(Request $request,$userId,$sponsorId,$apartmentId)
    {
        $user = User::find($userId);

        // dd($userId,$sponsorId,$apartmentId);

        $sponsor = Sponsor::findOrFail($sponsorId);
        $sponsorPrice = $sponsor->price / 100;
        $amount = $sponsorPrice;

        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

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
                $this->sponsor_function($apartmentId,$sponsorId);
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
