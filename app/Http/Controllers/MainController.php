<?php

namespace App\Http\Controllers;
use App\Apartment;
Use App\Sponsor;
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

    $apartment = Apartment::findOrFail($id);
    $sponsors = Sponsor::all();
    return view('pages.apartment',compact('apartment','sponsors'));
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
