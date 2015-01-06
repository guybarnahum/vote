@section('content-header')
    {{ 'Numeric Range : ' . $quest['title'] }}
@stop

@section('content-body')
    <div id="chart_div" style="width:400; height:300"></div>
    {{ $quest[ 'value' ] }}
@stop