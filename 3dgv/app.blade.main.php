<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ setting('site.title') }} </title>
        <link rel="shortcut icon" href="{{asset('/images/fav_icon.png')}}" type="image/x-icon">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <!-- Bulma Version 0.7.4-->
        <link rel="stylesheet" href="https://unpkg.com/bulma@0.7.4/css/bulma.min.css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/hero.css') }}">
        <link rel="stylesheet" href="https://unpkg.com/bulma-modal-fx/dist/css/modal-fx.min.css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css') }}"/>
    </head>
    <body>
        @section('menu')

        <section class="is-info is-medium is-bold ">
                <nav class="navbar primary-background">
                        <div class="container">
                            <div class="navbar-brand">
                                <a class="navbar-item" href="{{ URL('/') }}">
                                     <img src="{{ Storage::disk('public')->url(setting('site.logo')) }}" alt="Logo" class="logo"> 
                                    <!--<img src="http://cohoconcepts.com/valji_live/code/storage/app/public/settings/April2019/3O42AwdfGPdF7rJgEwUt.png" alt="Logo" class="logo">-->
                                </a>
                                <span class="navbar-burger burger" data-target="navbarMenu">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                            </div>
                            <div id="navbarMenu" class="navbar-menu">
                                <div class="navbar-end">
                                    <div class="tabs is-right">
                                        {{ menu('App','menu') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>

        </section>
        @show
        
        @if ($message = Session::get('success'))
        <div class="notification is-success">
             <button class="delete"></button>
                <strong>{{ $message }}</strong>
        </div>
        @endif


        @if ($message = Session::get('error'))
        <div class="notification is-error">
             <button class="delete"></button>
                <strong>{{ $message }}</strong>
        </div>
        @endif


        @if ($message = Session::get('warning'))
        <div class="notification is-warning">
             <button class="delete"></button>
            <strong>{{ $message }}</strong>
        </div>
        @endif


        @if ($message = Session::get('info'))
        <div class="notification is-info">
             <button class="delete"></button>
            <strong>{{ $message }}</strong>
        </div>
        @endif


        @if ($errors->any())
        <div class="alert alert-danger">
             <button class="delete"></button>
            Please check the form below for errors
        </div>
        @endif
        @section('content')
        @show

        <footer class="footer has-background-black">
            <div class="container">
                <div class="columns">
                    <div class="column is-4 has-text-center ">
                        <p class="footer-text has-text-white has-text-center">{!! setting('site.footer_text') !!}</p>
                    </div>
                    <div class="column is-4 has-text-center">
                    {!! setting('site.social') !!}
                    </div>
                    <div class="column is-4 has-text-center footer-menu">
                         {{ menu('App-Footer') }}
                            <!--<ul class="menu is-center">-->
                            <!--        <li><a href="#">Home</a></li>-->
                            <!--        <li><a href="#">Products</a></li>-->
                            <!--        <li><a href="#">Catalogues</a></li>-->
                            <!--        <li><a href="#">Contact Us</a></li>-->
                            <!--        <li><a href="#">Sitemap</a></li>-->
                            <!--    </ul>-->
                    </div>
                </div>

            </div>

            <script type="text/javascript" src="{{asset('js/jquery.min.js') }}"></script>
            <script type="text/javascript" src="{{asset('js/jquery_migrate.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('js/bulma.js')}}"></script>


        </footer>
    </body>
</html>
