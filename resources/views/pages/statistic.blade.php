@extends('layouts.statistic-layout')
@section('content')
<h1>Pagina statistiche</h1>
    <div id="stats" v-cloak>
        <div>
            <ul class="stats-menu">
                <li>
                    <a class="button-link" v-on:click="generateData('views')">Visualizzazioni</a>
                </li>
                <li>
                    <a class="button-link" v-on:click="generateData('messages')">Messaggi</a>
                </li>
            </ul>
        </div>
        
        <div class="wrapper-statistics">
            <div v-if="noStats">Non ci sono statistiche da visualizzare!</div>

            <a class="button-link" v-for="year in years" v-on:click="generateStats(year)">
                @{{ year }}
            </a>
            <canvas id="statsChart" aria-label="Statistiche">
                <p>Il tuo dispositivo non supporta il canvas</p>
            </canvas>
        </div>
        
   </div> 
    

    
@endsection
