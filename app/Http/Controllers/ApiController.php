<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use DB;

class ApiController extends Controller
{
    public function filter(Request $request){

        // dd($request -> all());
        // $apartments=json_decode($request -> params);
        if($request->where!=''){
            $apartments= Apartment::where('title', 'LIKE','%'. $request->where.'%') -> get();
        }
        else
            $apartments= Apartment::all();
        // $apartments = Apartments::where('title', 'LIKE',$request -> )
        //             ->get();
        //             dd($apartments);
        return response() -> json(($apartments),200);
    }
}
