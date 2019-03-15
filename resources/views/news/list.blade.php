
@extends('layouts.app')

@section('title','新闻中心 | '.$common_data['config']['website'])

@section('description','新闻中心 | '.$common_data['config']['website'])

@section('main')

    @include('layouts._breadcrumb',['title'=>'公司新闻'])

    <!--content start-->
    <!--大屏内容 开始-->
    <div class="container py-4 d-none d-lg-block" >
        <div class="row ">
            <div class="col-lg-3 new-category">
                <nav class="nav text-center flex-column">
                    @foreach($new_categorys as $new_category)
                        <a class="nav-link my-1 py-3 {{ active_class((if_route('news') &&
                         if_route_param('category_id', $new_category->id))) }}"
                           href="{{ route('news',['category_id'=>$new_category->id]) }}">{{ $new_category->title }}</a>
                    @endforeach()
                </nav>
            </div>
            <div class="col-lg-9 py-4 px-4 new-list">
                <ul class="list-group">
                    @if(count($article_lists))
                        @foreach($article_lists as $article)
                            <a href="{{ route('news',['cateaory_id' => $article->cateaory_id, 'article_id' => $article->id]) }}"
                               class="list-group-item py-3 my-2 active">
                                {{ str_limit($article->title,'60','...')  }}
                                <span class="float-right"> {{ $article->created_at }} </span>
                            </a>
                        @endforeach()
                    @else
                        <a  class="list-group-item py-3 my-2 active">
                            暂时没有新闻
                        </a>
                    @endif

                </ul>

                <div class="row mt-3">
                    <nav class="mx-auto" aria-label="Page navigation example">
                        {{ $article_lists->links() }}
                    </nav>
                </div>

            </div>
        </div>
    </div>
    <!--大屏内容 结束-->

    <!--小屏内容 开始-->
    <div class="container pt-3 pb-4 d-lg-none new-list-md">
        <div id="accordion">
            @foreach($article_data as $keys => $articles)
                <div class="card">
                    <div class="card-header" id="heading{{ $keys }}">
                        <h5 class="mb-0">
                            <button class="btn btn-link btn-xs btn-block" style="color: #484848" data-toggle="collapse" data-target="#collapse{{ $keys }}"
                                 @if($keys == 0)  aria-expanded="true" @else  aria-expanded="false" @endif aria-controls="collapse{{ $keys }}">
                               {{ $articles->title }}
                            </button>
                        </h5>
                    </div>

                    <div id="collapse{{ $keys }}" class="collapse  @if($keys == 0)  show @endif " aria-labelledby="heading{{ $keys }}" data-parent="#accordion">
                        <div class="card-body">
                            <div class=" px-2 new-list" style="background-color: #fff">
                                <ul class="list-group">
                                    @if(count($articles['list']))
                                        @foreach($articles['list'] as $article)
                                            <a href="{{ route('news',['cateaory_id' => $article->cateaory_id, 'article_id' => $article->id]) }}"
                                               class="list-group-item py-3 my-2 active">
                                                {{ str_limit($article->title,'32','...')  }}
                                                {{--<span class="float-right"> {{ $article->created_at }} </span>--}}
                                            </a>
                                        @endforeach
                                    @else
                                        <a class="list-group-item py-3 my-2 active">
                                            暂时没有新闻
                                        </a>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        @if(count($articles['list']))
                            <div class="row mt-3">
                                <nav class="mx-auto" aria-label="Page navigation example">
                                    {{ $articles['list']->links() }}
                                </nav>
                            </div>
                        @endif

                            {{--<p class="text-center pb-2 loading"><span>加载更多</span></p>--}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!--小屏内容 结束-->

    <!--content end-->


@endsection