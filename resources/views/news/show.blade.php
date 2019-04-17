
@extends('layouts.app')

@section('title','公司新闻-'.$common_data['config']['website'])

@section('description','公司新闻-'.$common_data['config']['website'])

@section('main')

    @include('layouts._breadcrumb',
    [
        'nav'=>[
            'category_title' => $new->cateaory->title, //新闻分类title
            'category_id' => $new->cateaory_id, //新闻分类id
            'article_title' => $new->title, //文章title
    ]])

    <!--content start-->

    <div class="container py-4 " >
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
            <div class="col-lg-9 py-4 px-4">
                <div class="row mx-auto">
                    <div class="w-100 new-show">
                    @if(!empty($new))
                        <h4 class="text-center">
                            {{ $new->title }}
                        </h4>
                        <p class="text-center py-2">{{ $new->created_at }}</p>

                        <hr style="border:1px dashed #dcdcdc; height:1px">

                        <div class="new-content mt-4 pt-2">
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


@endsection