<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            @section('title')
            @show
        </title>

        <!-- fav icons -->

        <link rel="icon" type="image/x-icon"
              href="{{{ asset('assets/images/favicons/favicon.ico') }}}" />
        <link rel="icon" type="image/png"
              href="{{{ asset('assets/images/favicons/favicon.png') }}}" />

        <!-- iPhone 4 Retina display: -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114"
            href="{{{ asset('assets/images/favicons/apple-touch-icon-114x114-precomposed.png') }}}">

        <!-- iPad: -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72"
            href="{{{ asset('assets/images/favicons/apple-touch-icon-72x72-precomposed.png') }}}">

        <!-- iPhone: -->
        <link rel="apple-touch-icon-precomposed"
            href="{{{ asset('assets/images/favicons/apple-touch-icon-60x60-precomposed.png') }}}">

        <!-- css -->

        {{
            HTML::style('http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,400italic')
        }}

        {{ HTML::style('assets/css/bootstrap.min.css')           }}
        {{ HTML::style('assets/css/theme.min.css')               }}
        {{ HTML::style('assets/css/color-defaults.min.css')      }}
        {{ HTML::style('assets/css/swatch-beige-black.min.css')  }}
        {{ HTML::style('assets/css/swatch-black-beige.min.css')  }}
        {{ HTML::style('assets/css/swatch-black-white.min.css')  }}
        {{ HTML::style('assets/css/swatch-black-yellow.min.css') }}
        {{ HTML::style('assets/css/swatch-blue-white.min.css')   }}
        {{ HTML::style('assets/css/swatch-green-white.min.css')  }}
        {{ HTML::style('assets/css/swatch-red-white.min.css')    }}
        {{ HTML::style('assets/css/swatch-white-black.min.css')  }}
        {{ HTML::style('assets/css/swatch-white-blue.min.css')   }}
        {{ HTML::style('assets/css/swatch-white-green.min.css')  }}
        {{ HTML::style('assets/css/swatch-white-red.min.css')    }}
        {{ HTML::style('assets/css/swatch-yellow-black.min.css') }}
        {{ HTML::style('assets/css/fonts.min.css', array('media' => 'screen')) }}
        {{ HTML::style('assets/css/chart.css' )                  }}

    </head>

<body>

    <header id="masthead" class="navbar navbar-sticky swatch-red-white" role="banner">

        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".main-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#">
                    {{ HTML::image('assets/images/logo.png',
                                   'One of the best themes ever') }}
                    Angle
                </a>
            </div>

            <nav class="collapse navbar-collapse main-navbar" role="navigation">
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-highlight">
                                 {{ HTML::link('/'     , 'Home'  ) }}
                    </li>
                    @if ( Auth::guest() )
                        <li class="">{{ HTML::link('login' , 'Login' ) }}</li>
                    @else
                        <li class="">{{ HTML::link('secret', 'Secret') }}</li>
                        <li class="">{{ HTML::link('logout', 'Logout') }}</li>
                    @endif
                    <li class="">{{ HTML::link('about' , 'About' ) }}</li>
                </ul>
            </nav>
        </div>

    </header>

    <!-- content -->
    @yield('content')

    <!-- footer -->
    <footer id="footer" role="contentinfo">

    <section class="section swatch-red-white has-top">
        <div class="decor-top">
            <svg class="decor" height="100%" preserveaspectratio="none" version="1.1" viewbox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 0 L50 100 L100 0 L100 100 L0 100" stroke-width="0"></path>
            </svg>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div id="swatch_social-2" class="sidebar-widget  widget_swatch_social">
                        <ul class="unstyled inline small-screen-center social-icons social-background social-big">
                            <li>
                                <a target="_blank" href="http://www.oxygenna.com">
                                <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="http://www.oxygenna.com">
                                <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="http://www.oxygenna.com">
                                <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div id="text-4" class="sidebar-widget widget_text">
                        <div class="textwidget">
                            ANGLE 2014 ALL RIGHTS RESERVED
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </footer>

    <!-- go top -->

    <a class="go-top" href="javascript:void(0)">
        <i class="fa fa-angle-up"></i>
    </a>

    <!-- scripts are placed here -->

    {{ HTML::script('assets/js/packages.min.js') }}
    {{ HTML::script('assets/js/theme.min.js') }}
    {{ HTML::script('https://maps.googleapis.com/maps/api/js?sensor=false') }}
    {{ HTML::script('assets/js/map.min.js') }}
    {{ HTML::script('https://www.google.com/jsapi') }}
    {{ HTML::script('assets/js/google.chart.js') }}
    {{ HTML::script('https://www.google.com/jsapi' ) }}
    {{ HTML::script('assets/js/chart.js') }}

    <!-- more scripts.. -->
    <script type="text/javascript">
        @yield('scripts')
    </script>

</body>
</html>
