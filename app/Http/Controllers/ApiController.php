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
            $apartments= DB::table('apartments')
                            ->where('title', 'LIKE','%'. $request->where.'%')
                            ->where('number_rooms', '>=', $request->number_rooms)
                            ->where('number_beds', '>=', $request->number_beds)
                            ->get();
        }
        else
            $apartments= Apartment::all();
        return response() -> json(($apartments),200);
    }
    public function service(){
        $services=Service::all();
        // dd($services);
        return response() -> json(($services),200);
    }
    public function upservice(Request $request){
        if($request->where!=''){
            $apartments= DB::table('apartments')
                            ->join('apartment_service', 'apartment_service.apartment_id' , '=', 'apartments.id')
                            // ->join('services', 'apartment_service.service_id' , '=', 'services.id')

                            // ->join('apartment_service', 'service.id' , '=', 'apartment_service.service_id')
                            ->select('apartments.*','apartment_service.*')
                            ->where('title', 'LIKE','%'. $request->where.'%')
                            ->where('number_rooms', '>=', $request->number_rooms)
                            ->where('number_beds', '>=', $request->number_beds)
                            // ->where('service_id', '=', $request->service)
                            ->get();
        }
        else
            $apartments= Apartment::all();

            $finishapartment=[];
        foreach($apartments as $item){


                if(in_array($item->service_id,$request->service)){

                    // unset($apartments[$item]);
                    // array_splice($apartments,array_search($item,$apartments,true),1);
                    if(!in_array($item,$finishapartment)){

                        $tmp=array_search($item,$finishapartment);
                        if($item->title!=$finishapartment[$tmp]->title);{

                            array_push($finishapartment,$item);
                        }
                    }
                    // return response() -> json(($finishapartment),200);
                }

        }
        return response() -> json(($finishapartment),200);
    }

    public function destroy($id) {

        $apartment = Apartment::findOrFail($id);
        $apartment->delete();
        $apartment->save();

        return response() -> json("Deleted", 200);
    }
}
