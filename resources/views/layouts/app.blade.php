<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="{{ app()->getLocale() }}">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', '重庆悦灵安全技术咨询有限公司')</title>
    <meta name="description" content="@yield('description', '重庆悦灵安全技术咨询有限公司')" />
    <meta name="keywords" content="安全咨询,安全评价,环境评估,应急预案,消防技术咨询,重庆安全,重庆悦灵,重庆安全技术,重庆安全咨询">

    <link href="{{ asset('css/css.css')  }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/lrtk.css')  }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('js/jquery-1.8.3.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/hits.js') }}" type="text/javascript"></script>
    <script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
</head>

<body onload="time()">

<div class="index">
    {{--头部--}}

        @include('layouts._header')

    <!--five open-->

    <div class="main">
        @yield('content')
    </div>



    <!--five end-->

    @yield('main')


    {{--底部--}}
    @include('layouts._footer')

</div>


{{--二维码--}}
    @include('layouts._qrcode')
</body>

</html>

