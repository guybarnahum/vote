@extends('layouts.base')

@section('title')
404
@stop

@section('content-header')
404 - Page not found!
@stop

@section('content-body')

    <div class="text-center">
        <img src="assets/images/404.png" alt="404 - Page not found!">
    </div>

    <header class="section-header underline text-center">
        <div>
            <?php $messages = array('We need a map.',
                                    'I think we\'re lost.',
                                    'We took a wrong turn.');
                
                $msg = $messages[ mt_rand(0, count($messages) - 1)];
            ?>

            <h1 class="headline super hairline"> {{ $msg }} </h1>

            <h2>Server Error: 404 (Not Found)</h2>

            <h3>What does this mean?</h3>

            <p>
            We couldn't find the page you requested on our servers. We're really sorry
            about that. It's our fault, not yours. We'll work hard to get this page
            back online as soon as possible.
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
