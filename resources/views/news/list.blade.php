@extends('layouts.app')

@section('title','公司新闻-'.$common_data['config']['website'])

@section('description','公司新闻-'.$common_data['config']['website'])

@section('main')

    @include('layouts._breadcrumb',['title'=>'公司新闻'])

    <!--content start-->
    <!--大屏内容 开始-->
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-3 new-category news-left-nav">
                <nav class="nav text-center flex-column">
                    @foreach($new_categorys as $new_category)
                        <a class="nav-link my-1 py-3 {{ active_class((if_route('news') &&
                         if_route_param('category_id', $new_category->id))) }}"
                           href="{{ route('news',['category_id'=>$new_category->id]) }}">{{ $new_category->title }}</a>
                    @endforeach()
                </nav>

                @include('layouts._contact',['contact_us'=>$common_data['config']])

            </div>

            <div class="col-lg-9 py-1 px-4" >

                @foreach($article_lists as $list)
                    <div class="row pb-3">
                        <div class="col-md-4 pb-2">
                            <a href="#">
                                <img src="{{ asset('/uploads/'.$list['images']) }}" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="{{ route('news',['cateaory_id' => $list->cateaory_id, 'article_id' => $list->id]) }}" class="news-list-text" style="color: #484848">
                                <h6 class="py-1" >{{ $list->title }}</h6>
                                <p style="line-height: 1.6rem;text-indent: 2em">{{ $list->introduction }}</p>
                            </a>
                        </div>
                    </div>
                @endforeach

                <div class="row mt-3">
                    <nav class="mx-auto" aria-label="Page navigation example">
                        {{ $article_lists->links() }}
                    </nav>
                </div>

            </div>
        </div>
    </div>
    <!--大屏内容 结束-->

    <!--content end-->

@endsection