@extends('layouts.master')

@section('content')

    <section class="section swatch-red-white has-top" id="contact">
        <div class="decor-top">
            <svg class="decor" height="100%" preserveaspectratio="none" version="1.1" viewbox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0 L100 100 L0 100" stroke-width="0"></path>
            </svg>
        </div>

        <div class="container">
            <header class="section-header underline">
                <h1 class="headline super hairline">
                    @section('content-header')
                    @show
                </h1>
            </header>
                @yield('content-body')
            </div>
    </section>

@stop