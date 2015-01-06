@extends('layouts.master')

@section('content')

<section class="section swatch-red-white has-top" id="contact">
    <div class="decor-top">
        <svg class="decor" height="100%" preserveaspectratio="none" version="1.1" viewbox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 0 L100 100 L0 100" stroke-width="0"></path>
        </svg>
    </div>

    <div class="container">
    <header class="section-header underline">
    <h1 class="headline super hairline">
    @section('content-header')
    @show
    </h1>
    </header>
    @yield('content-body')
    </div>
</section>

@stop


@section('scripts')

@parent

// Load the Visualization API and the piechart package.
google.load('visualization', '1.0', {'packages':['corechart']});
// Set a callback to run when the Google Visualization API is loaded.
google.setOnLoadCallback( drawCharts );

var charts = [];

function setupChart( id, type, data_provider, options )
{
    var e = document.getElementById( id );
    
    if (e){
        var ctx = {};
        ctx.ready = true;
        ctx.id    = id;
        ctx.e     = e;
        ctx.type  = type;
        ctx.data_provider = data_provider;
        ctx.options = options;
    }
    else{
        var ctx = {};
        ctx.ready = false;
        ctx.id    = id;
    }

    charts.push( ctx );
}

function drawChart( ctx, ix, charts )
{
    try{
        var chart = null;
        
        if ( ctx.ready ){
            
            // select chart by preset type
            switch( ctx.type ){
                default         :
                case 'PieChart' : chart = new google.visualization.PieChart( ctx.e ); break;
                case 'BarChart' : chart = new google.visualization.BarChart( ctx.e ); break;
                case 'WtpDebug' : chart = new wtp.DebugChart( ctx.e ); break;
            }
            
            var data = ctx.data_provider();
            
            // hopefully these are set up..
            chart.draw( data, ctx.options );
        }
    }
    catch( err )
    {
        alert( "drawChart : " + err );
        // Either element was not defined, or it was not setup?
    }
}

function drawCharts()
{
    charts.forEach( drawChart );
}



@stop