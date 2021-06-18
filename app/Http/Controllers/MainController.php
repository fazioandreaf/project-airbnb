<?php

namespace App\Http\Controllers;
use App\Apartment;
// Use App\Statistic;
// Use App\Service;
use DB;
use Illuminate\Http\Request;

class MainController extends Controller {

  public function homepage() {

    // appartamenti sponsorizzati

    // $apartments = DB::table('apartments')
    //     ->join(
    //         'sponsored_apartments',
    //         'apartments.id',
    //         '=',
    //         'sponsored_apartments.apartment_id'
    //       )

    //     ->select('apartments.*','sponsored_apartments.apartment_id')
    //     ->get();

    $apartments = Apartment::all();

    return view("pages.homepage",compact('apartments'));
  }

  // dettagli appartamento
  public function showApartment($id)
  {
    $apartment = Apartment::findOrFail($id);
    return view('pages.apartment',compact('apartment'));
  }



    // registrazione
  public function login_ui()
  {
    return view('pages.login');
  }
    public function debugdanny($id){
        $apartment=Apartment::findOrFail($id);
        return view('pages.myapartment',compact('apartment'));
    }
}
