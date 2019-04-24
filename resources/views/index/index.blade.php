
@extends('layouts.app')

@section('title','重庆悦灵安全技术咨询有限公司')

@section('description','重庆悦灵安全技术咨询有限公司')

@section('main')

    <!--banner start-->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    @foreach($common_data['banners'] as $key=> $banner)
    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="@if($key == 0)active  @endif banner-indicators"></li>
    @endforeach
    </ol>
    <div class="carousel-inner">

    @foreach($common_data['banners'] as $key=> $banner)
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

    <!--关于我们-->
    <div>
        <div class="container py-5" >
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block">
                    <img class="img-fluid" src="{{ asset('/uploads/'.$article_data['about']['images']) }}">
                </div>

                <div class="col-lg-7 col-12 home-about ">
                    <h6 class="py-1"> <span class="title-top-boder">关于我们</span> <small class="small-color">&nbsp; About As </small></h6>
                    <div class="content-font-size">
                        {!! $article_data['about']['introduction'] !!}
                    </div>
                    <!--小屏按钮-->
                    <a class="btn btn-outline-light btn-sm more d-lg-none" href="{{ route('abouts',['id'=>$article_data['about']['id']]) }}" role="button">&nbsp;&nbsp; 了解更多 &nbsp;&nbsp;</a>
                    <!-- 大屏按钮-->
                    <a class="btn btn-outline-light btn-sm more more1-lg d-none d-lg-block" href="{{ route('abouts',['id'=>$article_data['about']['id']]) }}" role="button">&nbsp;&nbsp; 了解更多 &nbsp;&nbsp;</a>
                </div>
            </div>
        </div>
    </div>
    <!--关于我们-->


    <!--公司新闻-->
    <div style="background-color: #f6f6f6">
        <div class="container py-5">
            <h6 class="py-1"> <span class="title-top-boder">公司新闻</span> <small class="small-color">&nbsp; Company News </small></h6>
            <div class="row">
                <div class="col-lg-5 col-12">
                    <ul class="nav nav-pills nav-justified mb-2 " id="pills-tab" role="tablist">
                        @foreach($article_data['news'] as $keys => $articles)
                            <li class="nav-item ">
                                <a class="nav-link news-list mr-3 @if($keys == 0) active @endif"
                                   id="pills-{{$keys}}-tab" data-toggle="pill"
                                   href="#pills-{{$keys}}" role="tab" aria-controls="pills-{{$keys}}"
                                   @if($keys == 0) aria-selected="true" @else aria-selected="false" @endif >{{ $articles->title }}</a>
                            </li>
                        @endforeach
                        <li class="nav-item">
                        </li>
                    </ul>

                    {{--列表--}}
                    <div class="tab-content" id="pills-tabContent">
                        @foreach($article_data['news'] as $keys => $articles)
                            <div class="tab-pane fade show @if($keys == 0) active @endif" id="pills-{{ $keys }}" role="tabpanel"
                                 aria-labelledby="pills-{{ $keys }}-tab">
                                <div class="list-group">
                                    @if(count($articles['list']))
                                        @foreach($articles['list'] as $article)
                                            <a href="{{ route('news',['cateaory_id' => $article->cateaory_id, 'article_id' => $article->id]) }}"
                                               class="list-group-item list-group-item-action my-1 home-new-lists ">
                                                {{ str_limit($article->title,'40','...')  }}
                                                <span class="float-right d-none d-md-block">[ {{ $article->created_at }} ]</span>
                                            </a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{--列表--}}
                </div>

                <div class="col-lg-7 d-none d-lg-block">
                    <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @if(isset($article_data['news'][0]))
                                @foreach($article_data['news'][0]['list'] as $key => $article)
                                    <li data-target="#carouselExampleIndicators1" data-slide-to="{{ $key }}"
                                        @if($key == 0) class="active" @endif >
                                    </li>
                                @endforeach
                            @endif
                        </ol>
                        <div class="carousel-inner">
                            @if(isset($article_data['news'][0]))
                                @foreach($article_data['news'][0]['list'] as $key => $article)
                                    <div class="carousel-item @if($key == 0) active @endif">
                                        <a href="{{ route('news',['cateaory_id' => $article->cateaory_id, 'article_id' => $article->id]) }}">
                                            <img class="d-block w-100" style="max-height: 340px;min-height: 340px"
                                                 src="/uploads/{{ $article['images'] }}" alt=" slide" title="{{ $article->title }}">
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>
            </div>
        </div>
    </div>
    <!--公司新闻-->

    <!-- 业务范围start -->
    <div class="container pt-5 pb-3">
        <h6 class="py-1"> <span class="title-top-boder">{{ $ywfw['business']['title'] }}</span>
            <small class="small-color">&nbsp;{{ $ywfw['business']['en_title'] }} </small>
        </h6>

        <div class="card-deck">

            @foreach($ywfw['business']['list'] as $business)
                <div class="card">
                    <a class="home-business" href="{{ route('business',['id'=>$business->id]) }}">
                        <img class="card-img-top" src="{{ asset('uploads/'.$business['image']) }}" alt="{{ $business['title'] }}">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 0.85rem;">{{ $business['title'] }}</h5>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <!-- 业务范围 end -->

    <hr>

<!--合作伙伴 start-->
<div class="home-customer mb-1"  >
    <div class="container py-2" >
        <h4 class="py-1 mb-4 text-center">合作伙伴共建专业安全的企业服务</h4>
        <img src="{{ asset('images/hzhbbanner.jpg') }}" class="img-fluid" style="width: 100%">
        <div class="row mt-3">
            @foreach($article_data['links'] as $link)
                <div class="col-4 col-md-2 px-2">
                    <a href="{{ $link->url }}" target="_blank">
                        <img src="{{ asset('/uploads/'.$link->icon) }}" class="img-fluid" title="{{ $link->name }}" alt="{{ $link->name }}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!--合作伙伴 end-->
    <hr>
<!--联系我们 start-->
<div class="mb-4" >
    <div class="container pt-2" >
        {{--<h4 class="py-1 mb-4 text-center">联系我们</h4>--}}
        <div class="row mt-3">

            <div class="col-lg-7">
                <!--地图 start-->
                <script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=c36xsnTC0HTLcb9DNtpknAoSvGLbBS7h&s=1"></script>
                <script type="text/javascript" src="https://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.js"></script>
                <link rel="stylesheet" href="https://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.css" />
                <div id="allmap" class="baidu-maps" style="height: 300px"></div>

                <script type="text/javascript">
                    // 百度地图API功能
                    var map = new BMap.Map('allmap');
                    var poi = new BMap.Point(106.615322,29.654299);
                    map.centerAndZoom(poi, 16);
                    map.enableScrollWheelZoom();

                    var content = '<div style="margin:0;line-height:20px;padding:2px;">' +
                        '<img src="{{ asset('images/log.png') }}" alt="" style="float:right;zoom:1;overflow:hidden;width:100px;height:100px;margin-left:3px;"/>' +
                        '地址：{{ $common_data['config']['address'] }}<br/>电话：{{ $common_data['config']['phone'] }}<br/>简介：{{ $common_data['config']['website'] }}' +
                        '</div>';

                    //创建检索信息窗口对象
                    var searchInfoWindow = null;
                    searchInfoWindow = new BMapLib.SearchInfoWindow(map, content, {
                        title  : "{{ $common_data['config']['website'] }}",      //标题
                        width  : 290,             //宽度
                        height : 105,              //高度
                        panel  : "panel",         //检索结果面板
                        enableAutoPan : true,     //自动平移
                        searchTypes   :[
                            BMAPLIB_TAB_SEARCH,   //周边检索
                            BMAPLIB_TAB_TO_HERE,  //到这里去
                            BMAPLIB_TAB_FROM_HERE //从这里出发
                        ]
                    });
                    var marker = new BMap.Marker(poi); //创建marker对象
                    marker.enableDragging(); //marker可拖拽
                    marker.addEventListener("click", function(e){
                        searchInfoWindow.open(marker);
                    })
                    map.addOverlay(marker); //在地图中添加marker
                </script>
            <!--地图 end-->
            </div>

            <div class="col-lg-5 ">
                <div class="row">
                    <div class="col-8 col-lg-12 pt-4">
                        <p>公司地址：<span>{{ $common_data['config']['address'] }}</span></p>
                        <p>联系电话：<span>{{ $common_data['config']['phone'] }}</span></p>
                        <p>联系邮箱：<span>{{ $common_data['config']['email'] }}</span></p>
                        <p>联系电话：<span>{{ $common_data['config']['extend_contact1'] }}</span></p>
                        <p>联系电话：<span>{{ $common_data['config']['extend_contact2'] }}</span></p>
                    </div>

                    <div class=" col-4 d-block d-lg-none pt-4 text-center">
                        <img src="{{ asset('/uploads/'.$common_data['config']['wechat_qrcode']) }}" class="img-fluid px-2">
                        <p class="py-2">关注微信公众号</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--联系我们 end-->

@endsection