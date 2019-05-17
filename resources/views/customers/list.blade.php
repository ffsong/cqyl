@extends('layouts.app')

@section('title','经典案例-'.$common_data['config']['website'])

@section('description','经典案例-'.$common_data['config']['website'])

@section('main')

    @include('layouts._breadcrumb',['title'=>'经典案例'])

    <!--content start-->
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-3 new-category news-left-nav">
                <nav class="nav text-center flex-column">
                    <div id="accordion">
                        <div class="card" style="border: none">
                            @foreach($sub_classification as $key => $category)

                                @if(count($category['children']))

                                <a class=" nav-link my-1 py-3" data-toggle="collapse"
                                    data-target="#collapse{{ $key }}"
                                    aria-expanded="true"
                                    aria-controls="collapse{{ $key }}">
                                    {{ $category->title }}
                                </a>

                                <div id="collapse{{ $key }}" class="collapse show" aria-labelledby="heading{{ $key }}" data-parent="#accordion">
                                    @foreach($category['children'] as $data)
                                        <a class="nav-link my-1 py-2 {{ active_class((if_route('industry') &&
                         if_route_param('category_id', $data->id))) }}"
                                           href="{{ route('industry',['category_id'=>$data->id]) }}">{{ $data->title }}</a>
                                    @endforeach()
                                </div>

                                @else

                                    <a class="nav-link my-1 py-3
                                            {{ active_class((if_route('industry') && if_route_param('category_id', $category->id))) }}"
                                       href="{{ route('industry',['category_id'=>$category->id]) }}">
                                        {{ $category->title }}
                                    </a>
                                @endif

                            @endforeach
                        </div>
                    </div>
                </nav>

                @include('layouts._contact',['contact_us'=>$common_data['config']])

            </div>

            <div class="col-lg-9 py-1 px-4" >

                {{--大屏--}}
                <div class="list-group pb-3 d-none d-lg-block">
                    @foreach($customer_data as $list)
                        <a href="{{ route('industry',['category_id' => $list->cateaory_id, 'id' => $list->id]) }}"
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
                        <a href="{{ route('industry',['category_id' => $list->cateaory_id, 'id' => $list->id]) }}"
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
                        <a href="{{ route('industry',['category_id' => $list->cateaory_id, 'id' => $list->id]) }}"
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