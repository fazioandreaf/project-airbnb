<?php

namespace App\Http\Controllers;
use App\Apartment;
Use App\Sponsor;
Use App\Statistic;
Use App\User;
Use App\Service;
use Auth;
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
                    ->select('apartment_sponsor.*', 'apartments.*')
                    ->where('apartments.deleted_at', null)
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

        // public function myapartment($id){
        //     $user = User::findOrFail($id);
        //     $apartments=DB::table('apartments')
        //         ->join('users','apartments.user_id','=','users.id')
        //         ->select('apartments.*','users.*')
        //         ->where('apartments.user_id','=',$id)
        //         ->get();
        //         // dd($apartments);
        //     return view('pages.myapartment',compact('apartments', 'user'));
        // }
        // public function dashboard($id) {
        //     $user= Auth::id();
        //     $apartments=DB::table('apartments')
        //                 ->join('users','apartments.user_id','=','users.id')
        //                 ->select('apartments.*','users.*')
        //                 ->where('apartments.user_id','=',$user)
        //                 ->get();
        //     // dd($id);
        //     // $apartment-> users()->associate($id);
        //     // $apartment= Apartment::findOrFail();
        //     // dd($apartment);
        //     return view('pages.dashboard',compact('apartments'));
        // }
        //     public function add()
        // {
        //     $services = Service::all();
        //     $sponsors = Sponsor::all();
        //     return view('pages.newapartment',compact('services','sponsors'));
        // }

        // public function sponsor($id){
        //     $apartment = Apartment::findOrFail($id);
        //     $sponsors = Sponsor::all();
        //     return view('pages.sponsor',compact('sponsors','apartment'));
        // }
        // public function statistic($id){
        //     // $statistic=Statistic::findOrFail($id);
        //     $statistic=DB::table('statistics')
        //                 ->join('apartments','statistics.apartment_id','=','apartments.id')
        //                 ->select('statistics.*','apartments.*')
        //                 ->where('statistics.apartment_id','=',$id)
        //                 ->get();
        //     //             dd(count($statistic));
        //     return view('pages.statistic',compact('statistic'));
        // }

}
