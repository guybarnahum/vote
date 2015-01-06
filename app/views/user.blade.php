@extends('layouts.base')

@section('content-header')
    {{{ $user['name'] }}}
@stop

@section('content-body')
    <pre>
        {{ print_r($user['attributes'],true) }}
    </pre>
@stop
