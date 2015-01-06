@extends('layouts.base')

@section('content-header')
Quests
@stop

@section('content-body')

    @if (count($quests) === 0)

        No quests found..

    @else
        <pre>
            {{ count($quests) }} quests found:<br>
            @foreach($quests as $quest)

                <?php
                    $value_str = '';
                    
                    if ( is_array($quest->value) ){
                    
                        foreach( $quest->value as $key => $val ){
                            $value_str .= ',' . $key . ':' . $val;
                        }
                        if (!empty($value_str)) $value_str = substr($value_str,1);
                    }
                    else{
                        $value_str = json_encode( $quest->value );
                    }
                ?>

                {{ $quest->owner_name . " asked : " .
                   $quest->title  .      " (" .
                   $quest->votes  . " answers " .
                   $value_str     . ")"
                }}
            @endforeach
        </pre>
    @endif

@stop