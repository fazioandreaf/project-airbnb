@extends("layouts.main_layout")
@section("content")

    <form action="{{Route('add_function')}}" method="post"
        enctype="multipart/form-data">

        @csrf
        @method('post')
        
        <div>
            <label for="user_id">User</label>
            <input type="number" name='user_id' id="user_id" value="{{Auth::id()}}">
        </div>

        <div style='margin:20px'>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>
        </div>

        <div style='margin:20px'>
            <label for="number_rooms">Number Rooms</label>
            <input type="number" name="number_rooms" id="number_rooms" required>
        </div>

        <div style='margin:20px'>
            <label for="number_toiletes">Number Toiletes</label>
            <input type="number" name="number_toiletes" id="number_toiletes" required>
        </div>

        <div style='margin:20px'>
            <label for="number_beds">Number Beds</label>
            <input type="number" name="number_beds" id="number_beds" required>
        </div>

        <div style='margin:20px'>
            <label for="area">Area</label>
            <input type="number" name="area" id="area" required>
        </div>

        <div style='margin:20px'>
            <label for="address">Address</label>
            <input type="text" name="address" id="address" required>
        </div>

        <div style='margin:20px'>
            <label for="latitude">Latitude</label>
            <input type="number" name="latitude" id="latitude" required>
        </div>

        <div style='margin:20px'>
            <label for="longitude">Longitude</label>
            <input type="number" name="longitude" id="longitude" required>
        </div>

        <div style='margin:20px'>
            <label for="cover_image">Image</label>
            <input id="cover_image" type="file" name="cover_image">
        </div>

        <div style='margin:20px'>
            @foreach ($services as $service)
                <div>
                    <label for="service_id[]">{{$service->service}}</label>
                    <input type="checkbox" name="service_id[]" id="service_id[]" value="{{$service->id}}"                    >
                </div>
            @endforeach
        </div>


        <button style='margin:20px' type="submit">Invia</button>

    </form>
@endsection