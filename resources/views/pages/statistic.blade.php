@extends('layouts.statistic-layout')
@section('content')
<h1>Pagina statistiche</h1>
    <div id="stats" v-cloak>
        <ul>
            <li>
                <button v-on:click="generateData('views')">Visualizzazioni per mesi</button>
            </li>
            <li>
                <button v-on:click="generateData('messages')">Messaggi per mesi</button>
            </li>
            <li v-if="noStats">Non ci sono statistiche da visualizzare!</li>
        </ul>
        <button v-for="year in years" v-on:click="generateStats(year)">
            @{{ year }}
        </button>
        <canvas id="statsChart" aria-label="Statistiche">
            <p>Il tuo dispositivo non supporta il canvas</p>
        </canvas>
        
   </div> 
    

    
@endsection
