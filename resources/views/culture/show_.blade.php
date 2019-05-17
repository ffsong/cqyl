
@extends('layouts.app')

@section('title','行业案例-'.$common_data['config']['website'])

@section('description','行业案例-'.$common_data['config']['website'])

@section('main')

    {{--@include('layouts._breadcrumb',--}}
    {{--[--}}
        {{--'nav'=>[--}}
            {{--'category_title' => $result->cateaory->title, //新闻分类title--}}
            {{--'category_id' => $result->cateaory_id, //新闻分类id--}}
            {{--'article_title' => $result->title, //文章title--}}
    {{--]])--}}

    @include('layouts._breadcrumb',['title'=>'企业文化'])

    <!--content start-->

    <div class="container py-2 " >
        <div class="row ">
            <div class="col-lg-3 new-category">
                <nav class="nav text-center flex-column">
                    <a class="nav-link my-1 py-3 {{ active_class((if_route('culture') &&
                         if_route_param('category_id', $article_['cateaory_id']))) }}"
                       href="{{ route('culture',
                                ['category_id'=>$article_['cateaory_id'],'article_id'=>$article_['id']]
                                ) }}">
                        {{ $article_['title'] }}
                    </a>

                    @foreach($sub_classification as $category)
                        <a class="nav-link my-1 py-3 {{ active_class((if_route('culture') &&
                         if_route_param('category_id', $category->id))) }}"
                           href="{{ route('culture',['category_id'=>$category->id]) }}">{{ $category->title }}</a>
                    @endforeach()
                </nav>

                @include('layouts._contact',['contact_us'=>$common_data['config']])
            </div>
            <div class="col-lg-9 pt-4 px-4" >
                <div class="row mx-auto">
                    <div class="w-100 new-show">
                        @if(!empty($result))
                            <div class="new-content mt-4 ">
                                {!! $result->content !!}
                            </div>

                            <div class="float-right" style="margin-top: 20px;">
                                @if($result->enclosure)
                                    <a style="color: red" href="{{ route('down',['id'=>$result->id]) }}" title="{{ substr($result->enclosure,6,-1) }}">{{ substr($result->enclosure,6,-1) }} 附件下载</a>
                                @endif
                            </div>
                        @else
                            内容已经被作者删除啦。(─.─|||！
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--content end-->


@endsection