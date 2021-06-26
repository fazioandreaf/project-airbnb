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

            $tmp=[];
            foreach ($finishapartment as $i ) {
                array_push($tmp,$i->title);
            }
                // se il servizio sta all interno dell array del servizio
                if(in_array($item->service_id,$request->service)){
                        if(!in_array($item->title,$tmp))
                        array_push($finishapartment,$item);
                }else{
                    //non ha servizi selezionato, è contenuto nel nella lista dei titoli?
                    if(in_array($item->title,$tmp)){
                        $array_di_indici=[];
                        foreach($finishapartment as $i){
                            array_push($array_di_indici,$i->title);
                        }
                        // foreach ($finishapartment as $i) {

                            $indice=array_search($item->title, $array_di_indici);
                            array_splice($finishapartment,$indice,1);
                    }
                }
        }
        return response() -> json(($finishapartment),200);
    }
}
