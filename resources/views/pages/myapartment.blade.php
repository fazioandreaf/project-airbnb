@extends("layouts.minimal-layout")
@section("content")
<div>
    <h1>
        myapartment of
    </h1>
     {{$user->firstname}} {{$user->lastname}}
     <a style="margin:1.5rem;padding:1rem;background-color:blue" href="{{route('add',$user->id)}}">add</a>
     <div>

         <ul>
             @foreach ($apartments as $apartment)
                <li style="margin:20px">
                    <span style="background-color:white;padding:1rem">
                    {{$apartment->title}}
                    </span>
                    <a style="margin:1.5rem;padding:1rem;background-color:blue" href="{{route('statistic',$apartment->id)}}">statistic</a>
                    <a style="margin:1.5rem;padding:1rem;background-color:blue" href="{{route('sponsor',$apartment->id)}}">sponsor</a>
                    <a style="margin:1.5rem;padding:1rem;background-color:blue" href="{{route('edit',$apartment->id)}}">edit</a>
                    <a style="margin:1.5rem;padding:1rem;background-color:blue" href="{{route('delete',$apartment->id)}}">delete</a>
                    {{-- {{dd($apartment->id)}} --}}
                </li>
            @endforeach
            </ul>
        </div>

</div>

@endsection
