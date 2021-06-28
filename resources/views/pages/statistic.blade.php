@extends('layouts.statistic-layout')
@section('content')
<h1>Pagina statistiche</h1>
    <div id="stats">
        <ul>
            <li>
                <button v-on:click="createGraph('views','month')">Visualizzazioni per mesi</button>
            </li>
            <li>
                <button v-on:click="createGraph('views','year')">Visualizzazioni per anni</button>
            </li>
            <li>
                <button v-on:click="createGraph('messages','month')">Messaggi per mesi</button>
            </li>
            <li>
                <button v-on:click="createGraph('messages','year')">Messaggi per anni</button>
            </li>
        </ul>
        <canvas id="viewsChart"></canvas>

        <canvas id="messagesChart"></canvas>
    </div> 
    

    
@endsection
