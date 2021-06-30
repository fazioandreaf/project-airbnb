@extends('layouts.statistic-layout')
@section('content')
<h1>Pagina statistiche</h1>
    <div id="stats">
        <ul>
            <li>
                <button v-on:click="generateData('views')">Visualizzazioni per mesi</button>
            </li>
            <li>
                <button v-on:click="generateData('messages')">Messaggi per mesi</button>
            </li>

        </ul>
        <canvas id="statsChart"></canvas>
        <button v-for="year in years" v-on:click="generateStats(year)">
            @{{ year }}
        </button>
   </div> 
    

    
@endsection
