<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Landlord;
use App\Apartment;
use App\Sponsor;
use App\SponsoredApartment;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('home');
    }
    public function dashboard($id) {
        $landlord=Landlord::findOrFail($id);
        return view('pages.dashboard',compact('landlord'));
    }
    public function add(Request $request){
        $validate=$request->validate([
            'title'=>'bail|required|unique:posts'
            'rooms'=>'required|string'
            'bed'=>'required|integer'
            'bathroom'=>'required|integer'
            'area'=>'required|'
            'address'=>'required|'
            'url_img'=>'required|'
            'features'=>'required|'
        ]);

    }

} // END OF HomeController
