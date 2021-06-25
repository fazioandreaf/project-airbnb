@extends("layouts.main_layout")
@section("content")

    <form action="{{Route('edit_function',$apartment->id)}}" method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('POST')

        <div style="text-align: center">

            <div style="display: none">
                <label for="user_id">User</label>
                <input type="number" name='user_id' id="user_id" value="{{Auth::id()}}">
            </div>
    
            <div style="margin-top: 20px">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{$apartment->title}}" required>
            </div>
    
            <div>
                <label for="number_rooms">Number Rooms</label>
                <input type="number" name="number_rooms" id="number_rooms" value="{{$apartment->number_rooms}}" required>
            </div>
    
            <div>
                <label for="number_toiletes">Number Toiletes</label>
                <input type="number" name="number_toiletes" id="number_toiletes" value="{{$apartment->number_toiletes}}" required>
            </div>
    
            <div>
                <label for="number_beds">Number Beds</label>
                <input type="number" name="number_beds" id="number_beds" value="{{$apartment->number_beds}}" required>
            </div>
    
            <div>
                <label for="area">Area</label>
                <input type="number" name="area" id="area" value="{{$apartment->area}}" required>
            </div>
    
            <div>
                <label for="address">Address</label>
                <input type="text" name="address" id="address" value="{{$apartment->address}}" required>
            </div>
    
            <div>
                <label for="latitude">Latitude</label>
                <input type="number" name="latitude" id="latitude" value="{{$apartment->latitude}}" required>
            </div>
    
            <div>
                <label for="longitude">Longitude</label>
                <input type="number" name="longitude" id="longitude" value="{{$apartment->longitude}}" required>
            </div>
    
            <div style="margin: 20px">
                <label for="cover_image">Image</label>
                <input id="cover_image" type="file" name="cover_image" value="{{$apartment->cover_image}}">
            </div>
    
            <h2 style="margin: 20px">
                services
            </h2>
    
            <div>
                @foreach ($services as $service)
                    <div>
                        <label for="service_id[]">{{$service->service}}</label>
                        <input type="checkbox" name="service_id[]" id="service_id[]" value="{{$service->id}}"
                            @foreach ($apartment->services as $checkedService)
                                @if ($checkedService->id == $service->id)
                                    checked
                                @endif
                            @endforeach
                        >
                    </div>
                @endforeach
            </div>
            <button type="submit">Invia</button>
        </div>
        

    </form>
@endsection