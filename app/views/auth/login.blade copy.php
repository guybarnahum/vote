@extends('layouts.master')

@section('title')
@parent
:: Login
@stop

{{-- Content --}}

@section('content')

    <section class="section swatch-red-white" id="home">
        <div class="container">
            <header class="section-header text-center underline">
                <h1 class="headline hyper hairline">Login</h1>
            </header>
        </div>
    </section>

    <section class="section swatch-red-white has-top" id="contact">
        <div class="decor-top">
            <svg class="decor" height="100%" preserveaspectratio="none" version="1.1" viewbox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0 L100 100 L0 100" stroke-width="0"></path>
            </svg>
        </div>

        <div class="container">
            <header class="section-header underline">
                <h1 class="headline super hairline">Contact</h1>
            </header>

            <div class="row">
                <div class="col-md-6">
                    <div class="control-group {{{ $errors->has('username') ? 'error' : '' }}}">

                        {{ Form::open(array('url'   => 'login'       ,
                                            'class' => 'contact-form',
                                            'id'    => 'contactForm' ,
                                            'novalidate' => ''       )) }}

                        <!-- Name -->

                        <div class="control-group {{{ $errors->has('username') ? 'error' : '' }}}">

                            {{ Form::label('username', 'Username', array('class' => 'control-label')) }}

                            <div class="form-group form-icon-group">
                            <input class="form-control" id="name" placeholder="Your name *" type="text">
                            <i class="fa fa-user"></i>
                                {{ Form::text('username', Input::old('username')) }}
                                {{ $errors->first('username') }}
                            </div>
                        </div>

                        <div class="form-group form-icon-group">
                            <input class="form-control" id="name" placeholder="Your name *" type="text">
                            <i class="fa fa-user"></i>
                        </div>

                        <div class="form-group form-icon-group">
                            <input class="form-control" id="email" placeholder="Your email *" type="text">
                            <i class="fa fa-envelope"></i>
                        </div>

<div class="form-group form-icon-group">
<textarea class="form-control" id="message" placeholder="Your message" rows="10"></textarea>
<i class="fa fa-pencil"></i>
</div>
<div class="form-group text-center">
<button class="btn btn-primary btn-icon btn-icon-right" type="submit">
Send email
<div class="hex-alt">
<i class="fa fa-envelope"></i>
</div>
</button>
</div>
<div id="messages">
</div>
</form>
</div>


</div>
</div>
</div>
</div>

<div class="page-header">
    <h2>Login into your account</h2>
</div>


    <!-- Name -->
    <div class="control-group {{{ $errors->has('username') ? 'error' : '' }}}">
    {{ Form::label('username', 'Username', array('class' => 'control-label')) }}

        <div class="controls">
        {{ Form::text('username', Input::old('username')) }}
        {{ $errors->first('username') }}
        </div>
    </div>

    <!-- Password -->
    <div class="control-group {{{ $errors->has('password') ? 'error' : '' }}}">
    {{ Form::label('password', 'Password', array('class' => 'control-label')) }}

        <div class="controls">
        {{ Form::password('password') }}
        {{ $errors->first('password') }}
        </div>
    </div>

    <!-- Login button -->
    <div class="control-group">
        <div class="controls">
        {{ Form::submit('Login', array('class' => 'btn')) }}
        </div>
    </div>

    {{ Form::close() }}
@stop