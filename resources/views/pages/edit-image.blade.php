@extends('layouts.minimal-layout')
@section('content')
    <div>
        <form action="{{Route('update_image',$apartment->id)}}"
          method="POST"
          enctype="multipart/form-data"
        >
            @foreach ($apartment -> images as $key => $image)
                <div>
                    @switch($key)
                        @case(0)
                            <label for="image[0]">Esterno</label>
                            <input type="file" id="image[0]">
                            {{-- <img style="width: 350px" class="immagini-piccole" src="{{asset('/storage/assets/external/'.$image->image)}}" alt="immagine-qui" style="width: 100%;height: 100%;"> --}}
                            @break
                        @case(1)
                            <label for="image[1]">Soggiorno</label>
                            <input type="file" id="image[1]">
                            {{-- <img style="width: 350px" class="immagini-piccole" src="{{asset('/storage/assets/living-room/'.$image->image)}}" alt="immagine-qui" style="width: 100%;height: 100%;"> --}}
                            @break
                        @case(2)
                            <label for="image[2]">Cucina</label>
                            <input type="file" id="image[2]">    
                            {{-- <img style="width: 350px" class="immagini-piccole" src="{{asset('/storage/assets/kitchen/'.$image->image)}}" alt="immagine-qui" style="width: 100%;height: 100%;">   --}}
                            @break  
                        @case(3)
                            <label for="image[3]">Camera da letto</label>
                            <input type="file" id="image[3]">
                            {{-- <img style="width: 350px" class="immagini-piccole" src="{{asset('/storage/assets/bedroom/'.$image->image)}}" alt="immagine-qui" style="width: 100%;height: 100%;">   --}}
                            @break 
                        @case(4)
                            <label for="image[4]">Bagno</label>
                            <input type="file" id="image[4]">
                            {{-- <img style="width: 350px" class="immagini-piccole" src="{{asset('/storage/assets/bathroom/'.$image->image)}}" alt="immagine-qui" style="width: 100%;height: 100%;">   --}}
                            @break                        
                    @endswitch
                </div>
            @endforeach
            <button type="submit">Invia</button>
        </form>
    </div>
@endsection