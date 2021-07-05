<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\User;
use App\Apartment;
use App\Sponsor;
Use App\Service;
use App\SponsoredApartment;
use App\Image;


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
        $user= User::findOrFail($id);
        $apartments= Apartment::where('user_id', '=', $id) -> get();
        return view('pages.dashboard',compact('apartments','user'));
    }
    public function myapartment($id){
        $user = User::findOrFail($id);
        $apartments = Apartment::where('user_id','=',$id )
                    ->get();
        return view('pages.myapartment',compact('apartments', 'user'));
    }
    // nuovo appartamento
    public function add()
    {
        $services = Service::all();
        $sponsors = Sponsor::all();
        return view('pages.newapartment',compact('services','sponsors'));
    }
    public function add_function(Request $request)
    {
        if ($request->user_id == Auth::id()) {
            
            $validated = $request -> validate([
                'title' => 'required|max:128|min:4',
                'description' => 'nullable|min:22',
                'number_rooms' => 'required|numeric',
                'number_toiletes' => 'required|numeric',
                'number_beds' => 'required|numeric',
                'area' => 'required|numeric',
                'address' => 'required',
                'user_id' => 'required|integer',
            ]);
            
            if (!is_null($request->service_id)) {
                $service = Service::findOrFail($request -> get('service_id'));
            }

            $apartment = Apartment::create($validated);
            // if ($request->hasFile('cover_image')) {
            //     $img = $request -> file('cover_image');
            //     $imgExt = $img -> getClientOriginalExtension();
            //     $newNameImg = time() . rand(1,1000) . '.' . $imgExt;
            //     $folder = '/assets/';
            //     $apartment -> cover_image = $newNameImg;
            //     $imgFile = $img -> storeAs($folder , $newNameImg , 'public');
            // }

            $apartment->services()->attach($request-> get('service_id'));
            $apartment->save();
            return redirect()->route('apartment',$apartment->id);
        }else{
            return back();
        }

    }

    // edit apartment
    public function edit($id)
    {
        $apartment = Apartment::findOrFail($id);
        $services = Service::all();
        return view('pages.edit',compact('apartment','services'));
    }
    // update apartment
    public function edit_function(Request $request, $id)
    {
        $validated = $request -> validate([
            'title' => 'required|max:128|min:4',
            'description' => 'nullable|min:22',
            'number_rooms' => 'required|numeric',
            'number_toiletes' => 'required|numeric',
            'number_beds' => 'required|numeric',
            'area' => 'required|numeric',
            'address' => 'required',
        ]);

        $apartment = Apartment::findOrFail($id);

        // if ($request->hasFile('cover_image')) {
        //     $img = $request -> file('cover_image');
        //     $imgExt = $img -> getClientOriginalExtension();
        //     $newNameImg = time() . rand(1,1000) . '.' . $imgExt;
        //     $folder = '/assets/';
        //     $imgFile = $img -> storeAs($folder , $newNameImg , 'public');
        //     $apartment -> cover_image = $newNameImg;
        // }

        $apartment->update($validated);
        $apartment->services()->sync($request-> get('service_id'));

        return redirect()->route('apartment',$apartment->id);
    }

    // softDeletes
    public function deleteApartment($id)
    {
        $apartment = Apartment::findOrFail($id);
        $apartment->delete();
        $apartment->save();
        return redirect()->route('myapartment',Auth::id());
    }

    public function statistic($id){
        $statistic=DB::table('statistics')
                    ->join('apartments','statistics.apartment_id','=','apartments.id')
                    ->select('statistics.*','apartments.*')
                    ->where('statistics.apartment_id','=',$id)
                    ->get();
        //             dd(count($statistic));

        $user_id = Auth::id();
        $user = User::findOrFail($user_id);
        return view('pages.statistic',compact('statistic', 'user'));
    }

    // init braintree
    public function sponsor($id){
        $apartment = Apartment::findOrFail($id);
        $sponsors = Sponsor::all();
        return view('pages.sponsor',compact('sponsors','apartment'));
    }

    public function edit_image($id)
    {
        $apartment = Apartment::findOrFail($id);
        return view('pages.edit-image',compact('apartment'));
    }
    public function update_image(Request $request, $id,$key,$idApartment)
    {
        // dd($request->all());
        $validated = $request -> validate([
            'image' => 'required'
        ]);
        $image = Image::findOrFail($id);
        if ($request->hasFile('image')) {
            $img = $request -> file('image');
            $imgExt = $img -> getClientOriginalExtension();
            $newNameImg = time() . rand(1,1000) . '.' . $imgExt;
            switch ($key) {
                case 0:
                    $folder = '/external/';
                    break;
                case 1: 
                    $folder = '/living-room/';
                    break;
                case 2: 
                    $folder = '/kitchen/';
                    break;
                case 3: 
                    $folder = '/bedroom/';
                    break;
                case 4: 
                    $folder = '/bathroom/';
                    break;
            }
            $imgFile = $img -> storeAs($folder , $newNameImg , 'public');
            // dd($img,$imgExt,$newNameImg,$imgFile);

            $image->image = $newNameImg;
            $image->update($validated);
            return redirect()->route('edit_image',$idApartment);
        }else {
            return back();
        }
    }
} // END OF HomeController
