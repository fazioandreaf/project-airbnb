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
    public function add_function(Request $request,$idUser)
    {
        $data = $request->all();   
        // dd($data);
        $validated = $request -> validate([
            'title' => 'required|max:128|min:4',
            'number_rooms' => 'required|numeric',
            'number_toiletes' => 'required|numeric',
            'number_beds' => 'required|numeric',
            'area' => 'required|numeric',
            'address' => 'required',
            // 'latitude' => 'required|numeric',
            // 'longitude' => 'required|numeric',
            'user_id' => 'required',
        ]);

        $validated->user_id = $idUser;
        dd($validated->user_id);
        $service = Service::findOrFail($request -> get('service_id'));
        $apartment = Apartment::create($validated);

        if ($request->hasFile('cover_image')) {
            $img = $request -> file('cover_image');
            $imgExt = $img -> getClientOriginalExtension();
            $newNameImg = time() . rand(1,1000) . '.' . $imgExt;
            $folder = '/assets/';
            $apartment -> cover_image = $newNameImg;
            $imgFile = $img -> storeAs($folder , $newNameImg , 'public');
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
            // 'latitude' => 'required|numeric',
            // 'longitude' => 'required|numeric',
            // 'user_id' => 'required',
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

} // END OF HomeController
