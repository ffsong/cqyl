@extends('layouts.app')

@section('title','企业文化-'.$common_data['config']['website'])

@section('description','企业文化-'.$common_data['config']['website'])

@section('main')

    @include('layouts._breadcrumb',['title'=>'企业文化'])

    <!--content start-->
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-3 new-category news-left-nav">
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

            <div class="col-lg-9 py-1 px-4" >

                {{--大屏--}}
                <div class="list-group pb-3 d-none d-lg-block">
                    @foreach($customer_data as $list)
                        <a href="{{ route('culture',['category_id' => $list->cateaory_id, 'id' => $list->id]) }}"
                           class="news-list-text list-group-item-action" style="color: #484848">
                        {{ str_limit($list->title,100,'...')  }}
                            <span class="float-right">{{ $list->created_at  }}</span>
                        </a>
                    @endforeach
                </div>
                {{--大屏--}}

                {{--中屏--}}
                <div class="list-group pb-3 d-none d-sm-block d-lg-none">
                    @foreach($customer_data as $list)
                        <a href="{{ route('culture',['category_id' => $list->cateaory_id, 'id' => $list->id]) }}"
                           class="news-list-text list-group-item-action" style="color: #484848">
                            {{ str_limit($list->title,50,'...')  }}
                            <span class="float-right">{{ $list->created_at  }}</span>
                        </a>
                    @endforeach
                </div>
                {{--中屏--}}

                {{--小屏--}}
                <div class="list-group pb-3 d-block d-sm-none">
                    @foreach($customer_data as $list)
                        <a href="{{ route('culture',['category_id' => $list->cateaory_id, 'id' => $list->id]) }}"
                           class="news-list-text list-group-item-action" style="color: #484848">
                            {{ str_limit($list->title,30,'...')  }}
                            <span class="float-right">{{ $list->created_at  }}</span>
                        </a>
                    @endforeach
                </div>
                {{--小屏--}}


                <div class="row mt-3">
                    <nav class="mx-auto" aria-label="Page navigation example">
                        {{ $customer_data->links() }}
                    </nav>
                </div>

            </div>
        </div>
    </div>
    <!--content end-->

@endsection