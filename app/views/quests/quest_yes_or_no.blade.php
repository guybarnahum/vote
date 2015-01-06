@section('content-header')
    {{ 'Yes / No : ' . $quest['title'] }}
@stop

@section('content-body')

    <?php
    
        $val = isset( $quest[ 'nvalue']['Yes'] )?
                      $quest[ 'nvalue']['Yes']  : 0;
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

@stop
