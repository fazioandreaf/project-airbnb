@extends("layouts.main_layout")
@section("content")
<div style="height: 100px">
    myapartment
    <a style="margin:1.5rem;padding:1rem;background-color:blue" href="{{route('add',$apartment->user_id)}}">add</a>
    <a style="margin:1.5rem;padding:1rem;background-color:blue" href="{{route('edit',$apartment->id)}}">edit</a>
    <a style="margin:1.5rem;padding:1rem;background-color:blue" href="{{route('statistic',$apartment->id)}}">statistic</a>
    <a style="margin:1.5rem;padding:1rem;background-color:blue" href="{{route('sponsor',$apartment->id)}}">sponsor</a>
</div>

@endsection
