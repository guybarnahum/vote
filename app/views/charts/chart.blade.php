@extends('layouts.chart')

@section('content-header')
    {{ 'Chart test' }}
@stop

@section('content-body')

    <?php
    
        $ok = isset( $data ) && is_array( $data );
        $val = $ok? $data[ 0 ] : 50;
    ?>

    <div class="chart easyPieChart"
                data-track-color="#e2d9d8"
                data-bar-color="#dd3333"
                data-line-width="20"
                data-percent="{{ $val }}"
                data-size="200">
        <span>
            {{ $val }}
        </span>
            {{ $val }}
    </div>

    <div id="chart1_div"></div>
    <div id="chart2_div"></div>
    <div id="chart3_div"></div>
    <div id="chart4_div"></div>

@stop


@section('scripts')

@parent

// Create the data
var dataprovider1 = function(){
    
        var data = new google.visualization.DataTable();
        
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
                         ['Mushrooms', 3],
                         ['Onions'   , 1],
                         ['Olives'   , 1],
                         ['Zucchini' , 1],
                         ['Pepperoni', 2],
                         [''         , 8],
                    ]);
        
            return data;
        };

// Set chart options
var options1 = {
    // title   :'How Much Pizza I Ate Last Night',
backgroundColor: 'transparent',
    width   : 400   ,
    height  : 300   ,
    pieHole : 0.5   ,
    colors  : ['#e0440e', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6', 'transparent'],
    pieStartAngle: -90,
    pieSliceText : 'none',
    tooltip : {trigger : 'selection'},
//  animation: { duration: 1000, easing: 'out' },
    is3D    : true
};

var dataprovider2 = function(){
    
    var data = new google.visualization.DataTable();
    
    data.addColumn('string', 'Yes or No');
    data.addColumn('number', 'Votes');
    data.addRows([
                     ['Yes'   ,  40 ],
                     ['No'    ,  30 ],
                     ['Maybe' ,  10 ],
                     ['None'  ,  20 ],
                     [''      ,   0 ],
                     [''      , 100 ],
                 ]);
    
    return data;
};

var options2 = {
    // title   :'Would you be willing to fly?',
    backgroundColor: 'transparent',
    width   : 400   ,
    height  : 300   ,
    pieHole : 0.5   ,
    
    colors  : ['#e0440e', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6', 'transparent'],
    pieSliceBorderColor: 'transparent',
    pieStartAngle   : -90,
    pieSliceText    : 'none',
    tooltip         : { trigger : 'selection' },
    };

var dataprovider3 = function(){

    var data = google.visualization.arrayToDataTable(
                [
                    [ '', 'Yes', 'No' ],
                    [ '',   80 ,  20  ],
                ]);
    
    var dataView = new google.visualization.DataView( data );
    
        dataView.setColumns(
        [   0,
//           { calc: "stringify", sourceColumn: 1, type: "string", role: "annotation" },
            1,
//           { calc: "stringify", sourceColumn: 2, type: "string", role: "annotation" },
            2,
        ]);
    
    return dataView;
}

var options3 = {
    width: 600,
    height: 400,
    //legend: { position: 'top', maxLines: 3 },
    bar: { groupWidth: '75%' },
    legend: 'none',
    isStacked: true
};

var dataprovider4 = function(){
    
    var data = new google.visualization.DataTable();
    
    data.addColumn('string', 'Task');
    data.addColumn('number', 'Daily Hours');
    data.addRows(5);
    data.setCell(0, 0, 'Work');
    data.setCell(0, 1, 11);
    data.setCell(1, 0, 'Play');
    data.setCell(1, 1, 10);
    data.setCell(2, 0, 'Sleep');
    data.setCell(2, 1,  9);
    data.setCell(3, 0, 'Eat');
    data.setCell(3, 1,  8);
    data.setCell(4, 0, 'Drink');
    data.setCell(4, 1,  7);
   
    return data;
};
// Draw our table with the data we created locally.
var options4 = {showLineNumber: false };

// Create the options
setupChart( 'chart1_div', 'PieChart', dataprovider1, options1 );
setupChart( 'chart2_div', 'PieChart', dataprovider2, options2 );
setupChart( 'chart3_div', 'BarChart', dataprovider3, options3 );
setupChart( 'chart4_div', 'WtpDebug', dataprovider4, options4 );

@stop
