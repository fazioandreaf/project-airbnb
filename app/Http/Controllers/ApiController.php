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
                            ->join('services', 'apartment_service.service_id' , '=', 'services.id')

                            // ->join('apartment_service', 'service.id' , '=', 'apartment_service.service_id')
                            ->select('apartments.*','apartment_service.*')
                            ->where('title', 'LIKE','%'. $request->where.'%')
                            ->where('number_rooms', '>=', $request->number_rooms)
                            ->where('number_beds', '>=', $request->number_beds)
                            // ->where('service_id', '=', $request->service)
                            ->get();
        }
        else
            $apartments= DB::table('apartments')
                            ->join('apartment_service', 'apartment_service.apartment_id' , '=', 'apartments.id')
                            ->join('services', 'apartment_service.service_id' , '=', 'services.id')

                            // ->join('apartment_service', 'service.id' , '=', 'apartment_service.service_id')
                            ->select('apartments.*','services.*','apartment_service.*')
                            ->where('title', 'LIKE','%'. $request->where.'%')
                            ->where('number_rooms', '>=', $request->number_rooms)
                            ->where('number_beds', '>=', $request->number_beds)
                            // ->where('service_id', '=', $request->service)
                            ->get();;

        $finishapartment=[];
        foreach($apartments as $item){
            // array_push($finishapartment,$item);
            // array dei nomi delle case
            $tmp=[];
            foreach ($finishapartment as $i ) {
                array_push($tmp,$i->title);
            }
                // se il servizio sta all interno dell array del servizio
                if(in_array($item->service_id,$request->service)){
                        // if(!in_array($item->title,$tmp))
                        array_push($finishapartment,$item);
                }else{
                    // //non ha servizi selezionato, è contenuto nel nella lista dei titoli?
                    // if(in_array($item->title,$tmp)){
                    //     $array_di_indici=[];
                    //     foreach($finishapartment as $i){
                    //         array_push($array_di_indici,$i->title);
                    //     }
                    //     // foreach ($finishapartment as $i) {

                    //         $indice=array_search($item->title, $array_di_indici);
                    //         array_splice($finishapartment,$indice,1);
                    // }
                }
                // array che contiene il numero di volte che viene contato il valore
                $tmp2=array_count_values($tmp);
                //array che contiene l'intersezione dei nomi delle case che corrispondono a tutti i filtri
                $intersezione_case=[];
                foreach($tmp2 as $key=> $value){
                    if($value==count($request->service))
                        array_push($intersezione_case,$key);
                }



                // carico un array degli apartmenti dell intersezione
                $intersezione_case_def=[];
                // $tmp3=[];
                foreach($intersezione_case as $single){
                    $tmp3=DB::table('apartments')
                            ->where('title', 'LIKE',$single)
                            ->get();
                            
                    array_push($intersezione_case_def,$tmp3);
                }

                // array_push($tmp2,sizeof($request->service));
        }
        return response() -> json(($intersezione_case_def),200);
    }
}
