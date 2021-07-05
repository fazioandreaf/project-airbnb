@extends('layouts.minimal-layout')
@section('content')
    <div>

        @foreach ($apartment -> images as $key => $image)
            <div>
                <form action="{{Route('update_image',[$image->id,$key,$apartment->id])}}"
                  method="POST"
                  enctype="multipart/form-data"
                >   
                
                    @csrf
                    @method('POST')

                    <div>
                        @switch($key)
                        @case(0)
                            <label for="image">Esterno</label>
                            <input type="file" name="image" id="image">
                            <img class="immagini-piccole" src="{{asset('/storage/assets/external/'.$image->image)}}" alt="immagine-qui" style="width: 100%;height: 100%;">
                            @break
                        @case(1)
                            <label for="image">Soggiorno</label>
                            <input type="file" name="image" id="image">
                            <img class="immagini-piccole" src="{{asset('/storage/assets/living-room/'.$image->image)}}" alt="immagine-qui" style="width: 100%;height: 100%;">
                            @break
                        @case(2)
                            <label for="image">Cucina</label>
                            <input type="file" name="image" id="image">
                            <img class="immagini-piccole" src="{{asset('/storage/assets/kitchen/'.$image->image)}}" alt="immagine-qui" style="width: 100%;height: 100%;">
                            @break
                        @case(3)
                            <label for="image">Stanza</label>
                            <input type="file" name="image" id="image">
                            <img class="immagini-piccole" src="{{asset('/storage/assets/bedroom/'.$image->image)}}" alt="immagine-qui" style="width: 100%;height: 100%;">  
                            @break  
                        @case(4)
                            <label for="image">Bagno</label>
                            <input type="file" name="image" id="image">
                            <img class="immagini-piccole" src="{{asset('/storage/assets/bathroom/'.$image->image)}}" alt="immagine-qui" style="width: 100%;height: 100%;">  
                            @break                        
                        @endswitch
                    </div>

                    <button type="submit">Invia</button>
                </form>
            </div>
        @endforeach

    </div>
@endsection