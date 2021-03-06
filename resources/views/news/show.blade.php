
@extends('layouts.app')

@section('title','新闻动态-'.$common_data['config']['website'])

@section('description','新闻动态-'.$common_data['config']['website'])

@section('main')

    {{--@include('layouts._breadcrumb',--}}
    {{--[--}}
        {{--'nav'=>[--}}
            {{--'category_title' => $new->cateaory->title, //新闻分类title--}}
            {{--'category_id' => $new->cateaory_id, //新闻分类id--}}
            {{--'article_title' => $new->title, //文章title--}}
    {{--]])--}}
    @include('layouts._breadcrumb',['title'=>'新闻动态'])

    <!--content start-->

    <div class="container py-2 " >
        <div class="row ">
            <div class="col-lg-3 d-none d-lg-block new-category">
                <nav class="nav text-center flex-column">
                    @foreach($new_categorys as $new_category)
                        <a class="nav-link my-1 py-3 {{ active_class((if_route('news') &&
                         if_route_param('category_id', $new_category->id))) }}"
                           href="{{ route('news',['category_id'=>$new_category->id]) }}">{{ $new_category->title }}</a>
                    @endforeach()
                </nav>

                @include('layouts._contact',['contact_us'=>$common_data['config']])
            </div>
            <div class="col-lg-9 pt-4 px-4">
                <div class="row mx-auto">
                    <div class="w-100 new-show">
                    @if(!empty($new))
                        <h4 class="text-center">
                            {{ $new->title }}
                        </h4>
                        <p class="text-center pt-4 mb-2">
                            <span class="float-left">来源：{{ $new->source }}</span>
                            <span class="">作者：{{ $new->author }}</span>
                            <span class="float-right">发表时间：{{ $new->created_at }}</span>
                        </p>

                        <hr style="border:0.5px dashed #dcdcdc;" class="py-0 my-0">

                        <div class="new-content mt-4 ">
                            {!! $new->content !!}
                        </div>

                        <div class="float-right" style="margin-top: 20px;">
                            @if($new->enclosure)
                                 <a style="color: red" href="{{ route('down',['id'=>$new->id]) }}" title="{{ substr($new->enclosure,6,-1) }}">{{ substr($new->enclosure,6,-1) }} 附件下载</a>
                            @endif
                        </div>
                    @else
                        新闻已经被作者删除啦。(─.─|||！
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--content end-->
    <script>
        $(function () {
            $(".new-content").find('img').parent('p').css({"text-indent":"0em"})
        })
    </script>

@endsection