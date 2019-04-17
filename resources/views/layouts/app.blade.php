<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--自定义css-->
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}"/>
    <title>@yield('title', $common_data['config']['website'])</title>
    <meta name="keywords" content="安全咨询,安全评价,环境评估,应急预案,消防技术咨询,重庆悦灵安全技术咨询有限公司,重庆悦灵,安全技术咨询">
    <meta name="description" content="重庆悦灵安全技术咨询服务有限公司是一重庆悦灵安全技术咨重庆悦灵安全技术咨询服务有限公司是一家集企业安全技术服务、安全咨询、安全监察、安全检验检测、安全评价、工程施工监理于一体，拥有专业安全技术、高层次人才和先进安全设备，面向国内市场提供安全技术和管理服务的新型企业。" />

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}" crossorigin="anonymous"></script>
</head>
<body>

@include('layouts._header',['categorys'=>$common_data['categorys'],'banners'=>$common_data['banners']])

<!--main-->
@yield('main')
<!--main-->

@include('layouts._footer',['config'=>$common_data['config']])


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('js/popper.min.js') }}"  crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"  crossorigin="anonymous"></script>


</body>
</html>