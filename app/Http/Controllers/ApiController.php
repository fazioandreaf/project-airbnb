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
        $apartments= Apartment::where('title', 'LIKE','%'. $request->where.'%') -> get();
        // $apartments = Apartments::where('title', 'LIKE',$request -> )
        //             ->get();
        //             dd($apartments);
        return response() -> json(($apartments),200);
    }
}
