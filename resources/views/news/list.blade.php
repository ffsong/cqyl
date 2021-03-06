@extends('layouts.app')

@section('title','新闻动态-'.$common_data['config']['website'])

@section('description','新闻动态-'.$common_data['config']['website'])

@section('main')

    @include('layouts._breadcrumb',['title'=>'新闻动态'])

    <!--content start-->
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

                {{--大屏--}}
                <div class="list-group pb-3 d-none d-lg-block">
                    @foreach($article_lists as $list)
                        <a href="{{ route('news',['cateaory_id' => $list->cateaory_id, 'article_id' => $list->id]) }}"
                           class="news-list-text list-group-item-action" style="color: #484848">
                        {{ str_limit($list->title,100,'...')  }}
                            <span class="float-right">{{ $list->created_at  }}</span>
                        </a>
                    @endforeach
                </div>
                {{--大屏--}}

                {{--中屏--}}
                <div class="list-group pb-3 d-none d-sm-block d-lg-none">
                    @foreach($article_lists as $list)
                        <a href="{{ route('news',['cateaory_id' => $list->cateaory_id, 'article_id' => $list->id]) }}"
                           class="news-list-text list-group-item-action" style="color: #484848">
                            {{ str_limit($list->title,50,'...')  }}
                            <span class="float-right">{{ $list->created_at  }}</span>
                        </a>
                    @endforeach
                </div>
                {{--中屏--}}

                {{--小屏--}}
                <div class="list-group pb-3 d-block d-sm-none">
                    @foreach($article_lists as $list)
                        <a href="{{ route('news',['cateaory_id' => $list->cateaory_id, 'article_id' => $list->id]) }}"
                           class="news-list-text list-group-item-action" style="color: #484848">
                            {{ str_limit($list->title,30,'...')  }}
                            <span class="float-right">{{ $list->created_at  }}</span>
                        </a>
                    @endforeach
                </div>
                {{--小屏--}}

                <div class="row mt-3">
                    <nav class="mx-auto" aria-label="Page navigation example">
                        {{ $article_lists->links() }}
                    </nav>
                </div>

            </div>
        </div>
    </div>
    <!--content end-->

@endsection