@extends("layouts.register-layout")
@section("content")
    <section id='edit-section'>

        <h2>
            Modifica la tua Struttura:
        </h2>
        <form action="{{Route('edit_function',$apartment->id)}}" method="POST"
            enctype="multipart/form-data">
    
            @csrf
            @method('POST')
    
            <div class="form-complit">
                <div class="form-text">
            
                    <div class="form-text-elem">
                        <label for="title">Titolo</label>
                        <input type="text" name="title" id="title" value="{{$apartment->title}}" required>
                    </div>

                    <div class="form-text-elem">
                        <label for="description">
                            Descrizione Struttura
                        </label>
                        <textarea name="description" id="description" cols="30" rows="10">{{$apartment->description}}</textarea>
                    </div>
            
                    <div class="form-text-elem">
                        <label for="number_rooms">Numero Camere</label>
                        <input type="number" name="number_rooms" id="number_rooms" value="{{$apartment->number_rooms}}" required>
                    </div>
            
                    <div class="form-text-elem">
                        <label for="number_toiletes">Numero Bagni</label>
                        <input type="number" name="number_toiletes" id="number_toiletes" value="{{$apartment->number_toiletes}}" required>
                    </div>
            
                    <div class="form-text-elem">
                        <label for="number_beds">Numero Letti</label>
                        <input type="number" name="number_beds" id="number_beds" value="{{$apartment->number_beds}}" required>
                    </div>
            
                    <div class="form-text-elem">
                        <label for="area">Area</label>
                        <input type="number" name="area" id="area" value="{{$apartment->area}}" required>
                    </div>
            
                    <div class="form-text-elem">
                        <label for="address">Indirizzo</label>
                        <input type="text" name="address" id="address" value="{{$apartment->address}}" required>
                    </div>
            
                    <div class="form-text-elem">
                        <label for="cover_image">Immagine</label>
                        <input id="cover_image" type="file" name="cover_image" value="{{$apartment->cover_image}}">
                    </div>
                </div>
    
                <div class="form-service">
                    <h4>
                        Servizi
                    </h4>
            
                    <div >
                        @foreach ($services as $service)
                            <div class="form-select">
                                <label for="service_id[{{$service->id}}]">{{$service->service}}</label>
                                <input type="checkbox" name="service_id[]" id="service_id[{{$service->id}}]" value="{{$service->id}}"
                                    @foreach ($apartment->services as $checkedService)
                                        @if ($checkedService->id == $service->id)
                                            checked
                                        @endif
                                    @endforeach
                                >
                            </div>
                        @endforeach
                    </div>
                </div>
              
            </div>
            <div class="form-btn">
                <button class='button-form' type="submit">Invia</button>
            </div>
            
    
        </form>

    </section>
    
@endsection