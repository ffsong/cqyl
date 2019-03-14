<div class="img-responsive top-bg ">
    <div class="container">
        <div class="row">
            <img class="img-fluid d-none d-lg-block" src="{{asset('./images/top_content.png')}}">
        </div>
    </div>
</div>

<!--nav start-->
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-0 px-0">
        <a class="navbar-brand d-lg-none px-0" style="width: 54%" href="{{ route('/') }}">
            <img class="img-fluid px-0" style="width: 100%" src="./images/w-logo_02.png" width="30" height="30" alt="">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse width-100" id="navbarNav">
            <div class="row width-100">
                <ul class="navbar-nav width-100">

                    <div class="col-sm-2">
                        <li class=" nav-item nva-{{ active_class(if_route('/')) }} ">
                            <a class="nav-link text-center nva-color" href="{{ route('/') }}">首页</a>
                        </li>
                    </div>

                    <div class="col-sm-2">
                        <li class=" nav-item nva-{{ active_class(if_route('abouts')) }} ">
                            <a class="nav-link text-center nva-color" href="{{ route('abouts') }}">{{ $categorys[0]['title'] }}</a>
                        </li>
                    </div>

                    <div class="col-sm-2">
                        <li class=" nav-item nva-{{ active_class(if_route('news')) }}">
                            <a class="nav-link text-center nva-color" href="{{ route('news',['category'=>6]) }}">{{ $categorys[1]['title'] }}</a>
                        </li>
                    </div>
                    <div class="col-sm-2">
                        <li class=" nav-item nva-{{ active_class(if_route('business')) }}">
                            <a class="nav-link text-center nva-color" href="{{ route('business') }}">{{ $categorys[2]['title'] }}</a>
                        </li>
                    </div>
                    <div class="col-sm-2">
                        <li class=" nav-item nva-{{ active_class(if_route('customers')) }}">
                            <a class="nav-link text-center nva-color" href="{{ route('customers') }}">{{ $categorys[3]['title'] }}</a>
                        </li>
                    </div>
                    <div class="col-sm-2">
                        <li class=" nav-item nva-{{ active_class(if_route('contacts')) }}">
                            <a class="nav-link text-center nva-color" href="{{ route('contacts') }}">{{ $categorys[4]['title'] }}</a>
                        </li>
                    </div>

                </ul>
            </div>
        </div>
    </nav>
</div>
<!--nav end-->

<!--banner start-->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($banners as $key=> $banner)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="@if($key == 0)active  @endif banner-indicators"></li>
        @endforeach
    </ol>
    <div class="carousel-inner">

        @foreach($banners as $key=> $banner)
            <div class="carousel-item @if($key == 0) active  @endif">
                <img class="d-block w-100" src="{{ asset('/uploads/'.$banner->url) }}" alt="First slide">
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!--banner end-->