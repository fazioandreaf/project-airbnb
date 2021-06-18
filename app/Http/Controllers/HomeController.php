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
        'sponsor_id' => 'required',
        ]);
        
        date_default_timezone_set('Europe/Rome');
        
        $start_date = date('m/d/Y h:i:s a', time());
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
        // dd($validated);
        
        $service = Service::findOrFail($request -> get('service_id'));
        $sponsor = Sponsor::findOrFail($request -> get('sponsor_id'));

        $apartment = Apartment::create($validated);

        $apartment->services()->attach($request-> get('service_id'));
        $apartment->sponsors()->attach($request-> get('sponsor_id'),
            ['start_date' => $start_date, 'expire_date' => $afterDate]);
        

        $apartment->save();

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
