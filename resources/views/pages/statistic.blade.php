@extends('layouts.statistic-layout')
@section('content')
<h1>Pagina statistiche</h1>
    <div id="stats">
        <ul>
            <li>
                <button v-on:click="createGraph('views')">Visualizzazioni per mesi</button>
            </li>
            <li>
                <button v-on:click="createGraph('messages')">Messaggi per mesi</button>
            </li>

        </ul>
        <canvas id="statsChart"></canvas>
        <button v-for="year in years" v-on:click="getYear(year)">
            @{{ year }}
        </button>
   </div> 
    

    
@endsection
