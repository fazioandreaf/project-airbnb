<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Landlord;
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
        $landlord=Landlord::findOrFail($id);
        return view('pages.dashboard',compact('landlord'));
    }
    public function myapartment($id){
        $apartment=Apartment::findOrFail($id);
        return view('pages.myapartment',compact('apartment'));
    }

    // nuovo appartamento
    public function add()
    {
        // $apartments = Apartment::all();
        $services = Service::all();
        // $sponsors = Sponsor::all();
        return view('pages.newapartment',compact('services'));
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
        'user_id' => 'required'
        ]);
        
        // dd($validated);
        $service = Service::findOrFail($request -> get('service_id'));
        $apartment = Apartment::create($validated);
        $apartment->services()->attach($request-> get('service_id'));
        

        $apartment->save();

        return redirect()->route('homepage');
    }


    public function statistic($id){
        $statistic=Statistic::findOrFail($id);
        return view('pages.statistic',compact('statistic'));
    }
    public function sponsor($id){
        $apartment=Apartment::findOrFail($id);
        return view('pages.sponsor',compact('apartment'));
    }
    public function sponsor_function($id){

    }

} // END OF HomeController
