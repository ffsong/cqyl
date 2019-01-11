<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="{{ app()->getLocale() }}">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'LaraBBS')</title>

    <link href="{{ asset('css/css.css')  }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/lrtk.css')  }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('js/jquery1.42.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.superslide.2.1.1.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/sohuflash_1.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery-1.8.3.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/koala.min.1.5.js') }}" type="text/javascript"></script>

</head>

<body onload="time()">

<div class="index">

    {{--头部--}}
    @include('layouts._header')


    @yield('main')


    {{--底部--}}
    @include('layouts._footer')

</div>


{{--二维码--}}
@include('layouts._qrcode')
</body>

</html>

