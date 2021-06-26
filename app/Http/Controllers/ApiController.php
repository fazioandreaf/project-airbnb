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

                // se il servizio sta all interno dell array del servizio
                if(in_array($item->service_id,$request->service)){

                    // unset($apartments[$item]);
                    // array_splice($apartments,array_search($item,$apartments,true),1);

                    // popolo un array che contengono tutti i titoli delle case

                        $tmp=[];
                        foreach ($finishapartment as $i ) {
                            array_push($tmp,$i->title);
                        }
                        if(!in_array($item->title,$tmp))
                        array_push($finishapartment,$item);
                        // $tmp=array_search($item,$finishapartment);
                        // if($item->title!=$finishapartment[$tmp]->title);{

                        // }

                    // return response() -> json(($finishapartment),200);
                }
                
                // array_unique($finishapartment,  SORT_REGULAR);

        }
        return response() -> json(($finishapartment),200);
    }
}
