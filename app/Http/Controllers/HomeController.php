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

         // da completare,
        // manca l'immagine

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
        $apartment->services()->attach($request-> get('service_id'));
        $apartment->save();

        return redirect()->route('homepage');
    }

    // edit apartment
    public function edit($id)
    {
        $apartment = Apartment::findOrFail($id);
        $services = Service::all();
        $sponsors = Sponsor::all();
        return view('pages.edit',compact('apartment','services','sponsors'));
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
            'cover_image' => 'nullable',
            'user_id' => 'required',
        ]);

        $apartment = Apartment::findOrFail($id);
        $apartment->update($validated);
        $apartment->services()->sync($request-> get('service_id'));

        return redirect()->route('homepage');
    }

    // add sponsor
    public function addSponsor(Request $request,$id)
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

    public function sponsor_function($id){

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
        $apartment = Apartment::findOrFail($id);
        $sponsors = Sponsor::all();
        return view('pages.sponsor',compact('sponsors','apartment'));
    }

} // END OF HomeController
