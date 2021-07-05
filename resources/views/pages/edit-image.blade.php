@extends('layouts.minimal-layout')
@section('content')
    <section id="section-add-images">
    
        <div class="container">

            <h1>
                {{$apartment->title}}
            </h1>

            @foreach ($apartment -> images as $key => $image)

                <div class="container-form-add">
                    <form action="{{Route('update_image',[$image->id,$key,$apartment->id])}}"
                    method="POST"
                    enctype="multipart/form-data"
                    >   
                    
                        @csrf
                        @method('POST')

                        <div class="add-image">
                            @switch($key)
                            @case(0)
                            <div class="label-input">
                                <label class="label-image" for="image">Foto Esterno</label>
                                <input class="input-image" type="file" name="image" id="image">
                            </div>
                                @break
                            @case(1)
                            <div class="label-input">
                                <label class="label-image" for="image">Foto Soggiorno</label>
                                <input class="input-image" type="file" name="image" id="image">
                            </div>
                                @break
                            @case(2)
                            <div class="label-input">
                                <label class="label-image" for="image">Foto Cucina</label>
                                <input class="input-image" type="file" name="image" id="image">
                            </div>
                                @break
                            @case(3)
                            <div class="label-input">
                                <label class="label-image" for="image">Foto Stanza</label>
                                <input class="input-image" type="file" name="image" id="image">
                            </div>
                                @break  
                            @case(4)
                            <div class="label-input">
                                <label class="label-image" for="image">Foto Bagno</label>
                                <input class="input-image" type="file" name="image" id="image">
                            </div>
                                @break                        
                            @endswitch
                            <button type="submit">Modifica Immagine</button>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    </section>
@endsection