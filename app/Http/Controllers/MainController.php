<?php

namespace App\Http\Controllers;
use App\Apartment;
Use App\Statistic;
use DB;
// use App\SponsoredApartment;
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

    $apartment = Apartment::findOrFail($id);
    $sponsor=Statistic::make($validate);
    $sponsor -> apartment() -> associate($id);
    $sponsor->save();
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
