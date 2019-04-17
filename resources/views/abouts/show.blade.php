
@extends('layouts.app')

@section('title','关于我们 | '.$common_data['config']['website'])

@section('description','关于我们 | '.$common_data['config']['website'])

@section('main')

    @include('layouts._breadcrumb',['title'=>'关于我们'])

    <!--content start-->
    <div class="container py-4" >
        <div class="row ">
            <div class="col-lg-3 new-category">
                <nav class="nav text-center flex-column">
                    @foreach($common_data['categorys'][0]['list_title'] as $about)
                        <a class="nav-link my-1 py-3 {{ active_class((if_route('abouts') &&
                         if_route_param('id', $about->id))) }}"
                           href="{{ route('abouts',['id'=>$about->id]) }}">{{ $about->title }}</a>
                    @endforeach()
                </nav>

                @include('layouts._contact',['contact_us'=>$common_data['config']])
            </div>
            <div class="col-lg-9 px-4">
                <div style="color: #484848;line-height: 1.6rem;text-indent:2em">
                    {!! $result->content !!}
                </div>
            </div>
        </div>
    </div>
    <!--content end-->


@endsection