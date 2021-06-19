<?php

namespace App\Http\Controllers;
use App\Apartment;
Use App\Sponsor;
Use App\Statistic;
use DB;
use Illuminate\Http\Request;

class MainController extends Controller {

  public function homepage() {
    $apartments = Apartment::all();
    return view("pages.homepage",compact('apartments'));
  }

  // dettagli appartamento
  public function showApartment(Request $request, $id)
  {
    // dd(\Request::getClientIp(true));
    // dd($request);
    $ip=\Request::ip();
    $validate=([
        'ip'=>$ip,
        'view_date'=>'2020-05-10',
    ]);
    // dd($ip);
    $apartment = Apartment::findOrFail($id);
    $statistic=Statistic::make($validate);
    $statistic -> apartment() -> associate($id);
    $statistic->save();
    $sponsors=Sponsor::all();
    return view('pages.apartment',compact('apartment','statistic','sponsors'));
  }



    // registrazione
    public function login_ui()
    {
        return view('pages.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function search()
    {
        return view('pages.search');
    }
    public function search_function(Request $request)
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

        return redirect()->route('apartment');
    }

    public function maps(){
        return view('pages.maps');
    }
    public function debugdanny($id){
        $apartment=Apartment::findOrFail($id);
        return view('pages.myapartment',compact('apartment'));
    }
}
