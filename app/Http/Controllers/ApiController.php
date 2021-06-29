<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Message;
use App\Statistic;
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
                            ->select('apartments.*','apartment_service.*')
                            ->where('title', 'LIKE','%'. $request->where.'%')
                            ->where('number_rooms', '>=', $request->number_rooms)
                            ->where('number_beds', '>=', $request->number_beds)
                            ->get();
        }
        else
            $apartments= DB::table('apartments')
                            ->join('apartment_service', 'apartment_service.apartment_id' , '=', 'apartments.id')
                            ->join('services', 'apartment_service.service_id' , '=', 'services.id')
                            ->select('apartments.*','services.*','apartment_service.*')
                            ->where('title', 'LIKE','%'. $request->where.'%')
                            ->where('number_rooms', '>=', $request->number_rooms)
                            ->where('number_beds', '>=', $request->number_beds)
                            ->get();;
        $finishapartment=[];
        foreach($apartments as $item){
            $tmp=[];
            foreach ($finishapartment as $i ) {
                array_push($tmp,$i->title);
            }
                // se il servizio sta all interno dell array del servizio
                if(in_array($item->service_id,$request->service)){
                        // if(!in_array($item->title,$tmp))
                        array_push($finishapartment,$item);
                }else{
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
                    array_push($intersezione_case_def,$tmp3[0]);
                }
        }
        return response() -> json(($intersezione_case_def),200);
    }

    public function destroy($id) {

        $apartment = Apartment::findOrFail($id);
        $apartment->delete();
        $apartment->save();

        return response() -> json("Deleted", 200);
    }

    public function getViews($id) {

        $views = Statistic::where('apartment_id', '=', $id)
                    ->get();

        return response() -> json($views, 200);
    }

    public function getMessages($id) {

        $messages = Message::where('apartment_id', '=', $id)
                    ->get();

        return response() -> json($messages, 200);
    }
}
