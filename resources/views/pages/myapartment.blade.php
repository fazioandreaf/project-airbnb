@extends("layouts.main_layout")
@section("content")
<div>
    <h1>
        myapartment of
    </h1>
     {{$user->firstname}} {{$user->lastname}}
     <a style="margin:1.5rem;padding:1rem;background-color:blue" href="{{route('add',$user->id)}}">add</a>
     <div>

         <ul>
             @foreach ($apartments as $item)
             <li style="margin:20px">
                <span
                style="background-color:white;padding:1rem"
                >
                {{$item->title}}
                </span>
                 <a style="margin:1.5rem;padding:1rem;background-color:blue" href="{{route('statistic',$item->id)}}">statistic</a>
                 <a style="margin:1.5rem;padding:1rem;background-color:blue" href="{{route('sponsor',$item->id)}}">sponsor</a>
                 <a style="margin:1.5rem;padding:1rem;background-color:blue" href="{{route('edit',$item->id)}}">edit</a>
                </li>
                @endforeach
            </ul>
        </div>

</div>

@endsection
