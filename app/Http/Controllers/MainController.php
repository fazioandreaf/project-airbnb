<?php

namespace App\Http\Controllers;
use App\Apartment;
Use App\Sponsor;
Use App\Statistic;
Use App\User;
use DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class MainController extends Controller {

  public function homepage() {

    //Filtro appartamenti sponsorizzati
    $now = Carbon::now()->setTimeZone("Europe/Rome");
    $apartments = DB::table('apartments')
                  ->join('apartment_sponsor', 'apartments.id' , '=', 'apartment_sponsor.apartment_id')
                  ->join('users', 'apartments.user_id' , '=', 'users.id')
                  ->select('apartment_sponsor.*', 'apartments.*', 'users.*')
                  ->where('apartment_sponsor.expire_date', '>', $now)
                  ->get();

    return view('pages.homepage', compact('apartments'));
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

    public function send(Request $request,$id){

        $validate=$request->validate([
            'email'=>'required|string',
            'text_message'=>'required|string',
        ]);
        // dd($ip);
        $apartment = Apartment::findOrFail($id);
        $message=Message::make($validate);
        $message -> apartment() -> associate($id);
        $message->save();
        return view('pages.message',compact('apartment','message'));
    }



    // funzioni di debug
    public function myapartment($id){
        $apartment=Apartment::findOrFail($id);
        return view('pages.myapartment',compact('apartment'));
    }
    public function dashboard($id) {
        // $user=User::findOrFail($id);
        $apartments=DB::table('apartments')
                    ->join('users','apartments.user_id','=','users.id')
                    ->select('apartments.*','users.*')
                    ->where('apartments.user_id','=',$id)
                    ->get();
        // dd($apartment);
        // dd($apartment);
        // $apartment-> users()->associate($id);
        // $apartment= Apartment::findOrFail();
        // dd($apartment);
        return view('pages.dashboard',compact('apartments'));
    }
}
