<?php

namespace App\Http\Controllers;
use App\Apartment;
Use App\Sponsor;
Use App\Statistic;
Use App\User;
Use App\Service;

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
        // $validated = $request -> validate([
        //     'sponsor_id' => 'required'
        // ]);

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

    public function sponsor($id){
        $apartment = Apartment::findOrFail($id);
        $sponsors = Sponsor::all();
        return view('pages.sponsor',compact('sponsors','apartment'));
    }

}
