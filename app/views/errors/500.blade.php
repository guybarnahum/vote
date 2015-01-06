@extends('layouts.base')

@section('title')
500 - Internal Server Error
@stop

@section('content-header')
Error 500 - Internal Server Error
@stop

@section('content-body')

    <div class="text-center">
        <img src="assets/images/500.png" alt="500 - Internal Server Error">
    </div>

    <header class="section-header underline text-center">
        <div>
            <?php
                $messages = array( 'Ouch.', 'Oh no!', 'Whoops!' );
                $msg      = $messages[ mt_rand(0, count($messages) - 1)];
            ?>

            <h1 class="headline super hairline"> {{ $msg }} </h1>
            <h2> Error: 500 Internal Server Error </h2>
            <h3>What does this mean?</h3>

            <p>
            Something went wrong on our servers while we were processing your request.
            We're really sorry about this, and will work hard to get this resolved as
            soon as possible.
            </p>

        </div>
    </header>

    <div class="text-center">
        <a class="btn btn-primary btn-lg btn-icon-right pull-center" href="/">
            Perhaps you would like to go home
            <div class="hex-alt hex-alt-big">
                <i class="fa fa-home" data-animation="tada"></i>
            </div>
        </a>
    </div>

@stop
