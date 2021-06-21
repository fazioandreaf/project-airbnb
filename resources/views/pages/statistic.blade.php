@extends('layouts.main_layout')
@section('content')
<h1>Pagina statistiche</h1>

@if (count($statistic)>0)

<strong>
    Numero di visualizzazione:
</strong>
{{count($statistic)}}


@else


Non hai ancora nessun appartamento
@endif


@endsection
