@extends('layouts.base')

@section('content-header')
Users
@stop

@section('content-body')

    @if (count($users) === 0)
        None found.. What is going on?
    @else

        <pre> {{ count($users) }} users found:<br>

        @foreach($users as $user)
            {{ $user->name }}
        @endforeach
        </pre>
    @endif

@stop

