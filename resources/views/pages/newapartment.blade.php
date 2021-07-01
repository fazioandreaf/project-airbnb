@extends("layouts.minimal-layout")
@section("content")

    <section id="newapartment-section">

        <h1>
            Aggiungi un nuovo appartamento
        </h1>

        <h4>
            Ci vorranno pochi minuti :)
        </h4>
        <form
        action="{{Route('add_function')}}"
        method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('POST')

        <div>

            <div style="display: none">
                <label for="user_id">
                    User
                </label>
                <input type="number" name='user_id' id="user_id" value="{{Auth::id()}}">
            </div>

            <h2>
                Dati Struttura:
            </h2>

            <div class="form-nw-apartment">
                <div class="form-nw-apartment-elm-tot">
                    <div class="elm-form">
                        <label for="title">
                            Nome Struttura
                        </label>
                        <input type="text" name="title" id="title" required>
                    </div>

                    <div class="elm-form">
                        <label for="description">
                            Descrizione Struttura
                        </label>
                        <textarea name="description" id="description" cols="30" rows="10"></textarea>
                    </div>

                    <div class="elm-form">
                        <label for="number_rooms">
                            Numero Camere
                        </label>
                        <input type="number" name="number_rooms" id="number_rooms" required>
                    </div>

                    <div class="elm-form">
                        <label for="number_toiletes">
                            Numero Bagni
                        </label>
                        <input type="number" name="number_toiletes" id="number_toiletes" required>
                    </div>

                    <div class="elm-form">
                        <label for="number_beds">
                            Numeri Letti
                        </label>
                        <input type="number" name="number_beds" id="number_beds" required>
                    </div>

                    <div class="elm-form">
                        <label for="area">
                            Area
                        </label>
                        <input type="number" name="area" id="area" required>
                    </div>

                    <div class="elm-form">
                        <label for="address">
                            Indirizzo
                        </label>
                        <input type="text" name="address" id="address" required>
                    </div>

                    <div class="elm-form-img">
                        <label for="cover_image">
                            Immagini
                        </label>
                        <input id="cover_image" type="file" name="cover_image" class="eml-img">
                    </div>
                </div>
                {{-- <input type="latitude"  name="latitude" type="number" value="1">
                <input type="longitude" style="display: none" name="longitude" type="number" value="1"> --}}
            </div>

            <h2 style="margin: 20px">
                services
            </h2>

            <div class="form-elem-service-tot">
                @foreach ($services as $service)
                    <div class="form-service-container">

                        <div class="form-elem-service-elm">
                            <label for="service_id[{{$service->id}}]">{{$service->service}}</label>
                            <input type="checkbox" name="service_id[]" id="service_id[]" value="{{$service->id}}">
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="submit">
                Invia
            </button>

        </div>


    </form>
    </section>


@endsection
