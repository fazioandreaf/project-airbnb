@extends('layouts.minimal-layout')
@section('content')
    <section id="section-add-images">

        <div class="container">

            <h1>
                {{$apartment->title}}
            </h1>

            @for ($i = 0; $i < 5; $i++)
                
                <div class="container-form-add">
                    <form action="{{Route('store_image',[$apartment->id,$i])}}"
                    method="POST"
                    enctype="multipart/form-data"
                    >   
                    
                        @csrf
                        @method('POST')

                        <div class="add-image">
                            @switch($i)
                                @case(0)
                                    <div class="label-input">
                                        <label class="label-image" for="image">Foto Esterno</label>
                                        <br>
                                        <input type="file" name="image" id="image" class="input-image">
                                    </div>
                                    @break
                                @case(1)
                                    <div class="label-input">
                                        <label class="label-image" for="image">Foto Soggiorno</label>
                                        <br>
                                        <input type="file" name="image" id="image" class="input-image"> 
                                    </div>
                                    @break
                                @case(2)
                                    <div class="label-input">
                                        <label class="label-image" for="image">Foto Cucina</label>
                                        <br>
                                        <input type="file" name="image" id="image" class="input-image">
                                    </div>
                                    @break
                                @case(3)
                                    <div class="label-input">
                                        <label class="label-image" for="image">Foto Stanza</label>
                                        <br>
                                        <input type="file" name="image" id="image" class="input-image">
                                    </div>
                                    @break  
                                @case(4)
                                    <div class="label-input">
                                        <label class="label-image" for="image">Foto Bagno</label>
                                        <br>
                                        <input type="file" name="image" id="image" class="input-image">
                                    </div>
                                    @break                        
                            @endswitch
                            <button type="submit">
                                Aggiungi Immaggine
                            </button>
                        </div>
                    </form>
                </div>
            @endfor
        </div>
    </section>
@endsection