
@extends('layouts.app')

@section('title','经典案例-'.$common_data['config']['website'])

@section('description','经典案例-'.$common_data['config']['website'])

@section('main')

    @include('layouts._breadcrumb',['title'=>$result->cateaory->title])

    <!--content start-->

    <div class="container py-2 " >
        <div class="row ">
            <div class="col-lg-3 d-none d-lg-block new-category">
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
            <div class="col-lg-9 pt-4 px-4">
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
                            内容已经被作者删除啦。(─.─|||！
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--content end-->

    <script>
        $(".new-content").find('img').parent('p').css({"text-indent":"0em"})
    </script>


@endsection