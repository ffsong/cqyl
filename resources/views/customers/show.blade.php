
@extends('layouts.app')

@section('title','行业案例-'.$common_data['config']['website'])

@section('description','行业案例-'.$common_data['config']['website'])

@section('main')

    <!--breadcrumb start-->
    <div class="breadcrumb-bg">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-text">
                    <li class="breadcrumb-item"><a href="{{ route('/') }}">首页</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href={{ route('industry') }}>
                                {{ $result->cateaory->title }}
                            </a>
                        </li>
                    <li class="breadcrumb-item active" aria-current="page">
                            {{ $result->title }}
                    </li>

                </ol>
            </nav>
        </div>
    </div>
    <!--breadcrumb end-->

    <div class="container py-4 " >
        <div class="row ">
            <div class="col-lg-3 d-none d-lg-block new-category">

                @include('layouts._contact',['contact_us'=>$common_data['config']])
            </div>

            <div class="col-lg-9 py-4 px-4">
                <div class="row mx-auto">
                    <div class="w-100 new-show">
                        @if(!empty($result))
                            <h4 class="text-center">
                                {{ $result->title }}
                            </h4>
                            <p class="text-center pt-4 mb-2">
                                <span class="float-left">来源：{{ $result->source }}</span>
                                <span class="">作者：{{ $result->author }}</span>
                                <span class="float-right">发表时间：{{ $result->created_at }}</span>
                            </p>

                            <hr style="border:0.5px dashed #dcdcdc;" class="py-0 my-0">

                            <div class="new-content mt-4 ">
                                {!! $result->content !!}
                            </div>

                            <div class="float-right" style="margin-top: 20px;">
                                @if($result->enclosure)
                                    <a style="color: red" href="{{ route('down',['id'=>$result->id]) }}" title="{{ substr($result->enclosure,6,-1) }}">{{ substr($result->enclosure,6,-1) }} 附件下载</a>
                                @endif
                            </div>
                        @else
                            新闻已经被作者删除啦。(─.─|||！
                        @endif
                    </div>
                </div>
            </div>


            {{--<div class="col-lg-9 py-4 px-4">--}}
                {{--<div class="row mx-auto">--}}
                    {{--<div class="w-100 new-show">--}}
                        {{--@if(!empty($result))--}}
                            {{--<div class="new-content mt-4 pt-2" style="text-indent: 2em">--}}
                                {{--{!! $result->content !!}--}}
                            {{--</div>--}}
                        {{--@else--}}
                            {{--新闻已经被作者删除啦。(─.─|||！--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}


        </div>
    </div>




@endsection