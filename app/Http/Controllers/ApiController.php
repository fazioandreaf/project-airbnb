<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Service;
use DB;

class ApiController extends Controller
{
    public function filter(Request $request){

        if($request->where!=''){
            $apartments= Apartment::where('title', 'LIKE','%'. $request->where.'%') -> get();
        }
        else
            $apartments= Apartment::all();
        return response() -> json(($apartments),200);
    }
    public function allservice(){
        $services=Service::all();
        dd($service);
        return response() -> json(($services),200);
    }
}
