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
    public function add(){
        $apartment=Apartment::all();
        $landlord=:andlord::all();
        return view('pages.manageapartment',compact('apartment','landlord'));
    }
    public function add_function(Request $request){
        $validate=$request->validate([
            'title'=>'bail|required|unique:posts',
            'rooms'=>'required|string',
            'bed'=>'required|integer',
            'bathroom'=>'required|integer',
            'area'=>'required|integer',
            'address'=>'required|string',
            'url_img'=>'required|string',
            'features'=>'required|string',
            'landlord_id'=>'required|integer'
        ]);
        $landlord_id=$request->get('landlord_id');
        $landlord=Landlord::findOrFail($landlord_id);
        $apartment=Apartment::make($validate);
        $apartment->landlord()->associate($landlord);
        $landlord->save();


    }

} // END OF HomeController
