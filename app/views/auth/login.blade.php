@extends('layouts.base')

@section('title')
@parent
:: Login
@stop

{{-- Content --}}

@section('content-header')
Login
@stop

@section('content-body')

<div class="row">
    <div class="col-md-6">

        {{ Form::open(array('url'   => 'login'       ,
                            'class' => 'contact-form',
                            'id'    => 'contactForm' ,
                            'novalidate' => ''       )) }}


        <!-- username -->
        <div class="control-group {{{ $errors->has('username') ? 'error' : '' }}}">
            <div class="form-group form-icon-group">

                {{ Form::text( 'username', Input::old('username'),
                        array( 'class'      => 'form-control',
                               'placeholder'=> 'user name *' ) ) }}

                {{ $errors->first('username') }}
                <i class="fa fa-user"></i>
            </div>
        </div>

        <!-- Password -->
        <div class="control-group {{{ $errors->has('password') ? 'error' : '' }}}">
            <div class="form-group form-icon-group">

                {{ Form::password( 'password',
                            array( 'class'      => 'form-control',
                                   'placeholder'=> 'password *' )) }}

                {{ $errors->first( 'password') }}
                <i class="fa fa-question"></i>
            </div>
        </div>

        <!-- Login button -->

        <div class="form-group text-center">
            <div class="control-group">

                {{ Form::submit('Login',
                array('class' => 'btn btn-primary btn-icon btn-icon-right')) }}

            </div>
        </div>

        {{ Form::close() }}

    </div>
</div>

@stop