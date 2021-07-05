@extends('layouts.minimal-layout')
@section('content')
    <div>

        @for ($i = 0; $i < 5; $i++)
            
            <div>
                <form action="{{Route('store_image',[$apartment->id,$i])}}"
                  method="POST"
                  enctype="multipart/form-data"
                >   
                
                    @csrf
                    @method('POST')

                    <div>
                        @switch($i)
                            @case(0)
                                <label for="image">Esterno</label>
                                <input type="file" name="image" id="image">
                                <button type="submit">
                                    Aggiungi Immaggine
                                </button>
                                @break
                            @case(1)
                                <label for="image">Soggiorno</label>
                                <input type="file" name="image" id="image"> 
                                <button type="submit">
                                    Aggiungi Immaggine
                                </button>
                                @break
                            @case(2)
                                <label for="image">Cucina</label>
                                <input type="file" name="image" id="image">
                                <button type="submit">
                                    Aggiungi Immaggine
                                </button>
                                @break
                            @case(3)
                                <label for="image">Stanza</label>
                                <input type="file" name="image" id="image">
                                <button type="submit">
                                    Aggiungi Immaggine
                                </button>
                                @break  
                            @case(4)
                                <label for="image">Bagno</label>
                                <input type="file" name="image" id="image">
                                <button type="submit">
                                    Aggiungi Immaggine
                                </button>
                                @break                        
                        @endswitch
                    </div>
                
                </form>
            </div>
        @endfor

    </div>
@endsection