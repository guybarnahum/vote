@extends('layouts.base')

@section('title')
@parent
:: Secret
@stop

@section('content-header')
Hello {{{ $user['name'] }}}!
@stop

@section('content-body')
You are logged in.
@stop
