
@extends('layouts.app')

@section('title','重庆悦灵安全技术咨询有限公司')

@section('description','重庆悦灵安全技术咨询有限公司')

@section('main')
<!--关于我们-->
<div>
    <div class="container py-5" >
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block">
                <img class="img-fluid" src="{{ asset('/uploads/'.$article_data['about'][0]['images']) }}">
            </div>

            <div class="col-lg-7 col-12 home-about ">
                <h6 class="py-1"> <span class="title-top-boder">关于我们</span> <small class="small-color">&nbsp; About As </small></h6>
                <div class="content-font-size">
                    {!! $article_data['about'][0]['content'] !!}
                </div>
                <!--小屏按钮-->
                <a class="btn btn-outline-light btn-sm more d-lg-none" href="{{ route('abouts') }}" role="button">&nbsp;&nbsp; 了解更多 &nbsp;&nbsp;</a>
                <!-- 大屏按钮-->
                <a class="btn btn-outline-light btn-sm more more1-lg d-none d-lg-block" href="{{ route('abouts') }}" role="button">&nbsp;&nbsp; 了解更多 &nbsp;&nbsp;</a>
            </div>
        </div>
    </div>
</div>
<!--关于我们-->

<!--典型客户-->
<div class="home-customer" style=" background-color: #f6f6f6">
    <div class="container py-5" >
        <h6 class="py-1"> <span class="title-top-boder">典型客户</span> <small class="small-color">&nbsp; Customer </small></h6>
        <div class="card-deck">
            @foreach($article_data['customers'] as $customer)
                <div class="card my-1 mx-auto">
                    <img class="card-img-top img-fluid" src="{{ asset('/uploads/'.$customer->images) }}" alt="Card image cap">
                    <div class="customer-text">
                        <p class="city" style="padding-top: 3rem">{{ $customer->title }}</p>
                        <p class="title" style="padding-bottom: 0.8rem">{{ $customer->introduction }}</p>
                        <p class="content">服务内容：{{ $customer->content }}</p>
                        <a class="btn btn-outline-light btn-sm more my-5" href="{{ route('customers') }}" role="button">&nbsp;&nbsp; 了解更多 &nbsp;&nbsp;</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!--典型客户-->

<!--公司新闻-->
<div>
    <div class="container py-5">
        <h6 class="py-1"> <span class="title-top-boder">公司新闻</span> <small class="small-color">&nbsp; Company News </small></h6>
        <div class="row">
            <div class="col-lg-7 col-12">
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
                                        <a href="{{ route('news',['cateaory_id' => $article->cateaory_id, 'article_id' => $article->id]) }}" class="list-group-item list-group-item-action my-3 py-4 news-list">
                                            {{ str_limit($article->title,'50','...')  }}
                                            <span class="float-right">[ {{ $article->created_at }} ]</span>
                                        </a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                {{--列表--}}
            </div>

            <div class="col-lg-5 d-none d-lg-block">
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
                                    <img class="d-block w-100" style="max-height: 340px;min-height: 340px"
                                         src="/uploads/{{ $article['images'] }}" alt=" slide">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--公司新闻-->

@endsection