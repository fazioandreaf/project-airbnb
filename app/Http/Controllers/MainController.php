<?php

namespace App\Http\Controllers;
use App\Apartment;
use DB;
// use App\SponsoredApartment;
use Illuminate\Http\Request;

class MainController extends Controller {

  public function homepage() {

    // appartamenti sponsorizzati
    $apartments = DB::table('apartments')
        ->join(
            'sponsored_apartments',
            'apartments.id',
            '=',
            'sponsored_apartments.apartment_id'
          )
        ->select('apartments.*','sponsored_apartments.apartment_id')
        ->get();

    return view("pages.homepage",compact('apartments'));
  }

  // dettagli appartamento
  public function showApartment($id)
  {
    $apartment = Apartment::findOrFail($id);
    return view('pages.apartment',compact('apartment'));
  }

    // registrazione
  public function login()
  {
    return view('pages.login');
  }
}
