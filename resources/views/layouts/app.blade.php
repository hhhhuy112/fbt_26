<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@lang('message.title')</title>
    {{ Html::style(asset('css/app.css')) }}
    {{ Html::style(asset('css/all.css')) }}
    {{ Html::style(asset('css/font-awesome.css')) }}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    @lang('message.brand')
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="#" class="nav-link">@lang('message.about')</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">@lang('message.contact')</a></li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">@lang('message.login')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">@lang('message.register')</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.show', Auth::user()->id) }}">
                                        @lang('message.profile')
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        @lang('message.mytravel')
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" id="logout">
                                        @lang('message.logout')
                                    </a>
                                    {!! Form::open(['route' => 'logout', 'id' => 'logout-form']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
    {{ Html::script(asset('js/app.js')) }}
    {{ Html::script(asset('js/main.js')) }}
    {{ Html::script(asset('js/main2.js')) }}
</body>
</html>
