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
                    ->where('expire_date', '>', $now)
                    ->where('apartments.deleted_at', null)
                    ->get();

        return view('pages.homepage', compact('apartments'));
    }
    // dettagli appartamento
    public function showApartment(Request $request, $id){
        // dd(\Request::getClientIp(true));
        // dd($request);
        $now = Carbon::now()->setTimeZone("Europe/Rome");
        $ip=\Request::ip();
        $validate=([
            'ip'=>$ip,
            'view_date'=> $now,
        ]);
        // dd($now);
        $apartment = Apartment::findOrFail($id);
        $statistic = Statistic::make($validate);
        $statistic -> apartment() -> associate($id);
        $statistic->save();
        $sponsors=Sponsor::all();
        return view('pages.apartment',compact('apartment','statistic','sponsors'));
    }

    // registrazione
    public function search(Request $request){
        // dd($request->where);
        if($request->where!=null){
            $apartments= Apartment::where('address', 'LIKE','%'. $request->where.'%') -> get();
            if(count($apartments)<1) {
                $apartments=[];
            }
        }
        else{
            $apartments= Apartment::first()->limit(50)->get();
        }
        return view('pages.search',compact('apartments'));
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
    }}
