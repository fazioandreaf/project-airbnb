<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function filter(Request $request){
        // dd($request);
        return response() -> json('mette qui dentro al data ('.$request-> data. ')',200);
    }
}
