
@extends('layouts.app')

@section('title','业务范围-'.$common_data['config']['website'])

@section('description','业务范围-'.$common_data['config']['website'])

@section('main')

    @include('layouts._breadcrumb',['title'=>'业务范围'])

    <!--content start-->

    <div class="container py-4" >
        <div class="row ">
            <div class="col-lg-3 new-category">
                <div class="nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    @foreach($business_data as $key=> $business)

                        <a class="nav-link my-1 py-3 {{ active_class((if_route('business') && if_route_param('id', $business->id))) }}"
                           href="{{ route('business',['id'=>$business->id]) }}">
                            {{ $business->title }}
                        </a>
                    @endforeach
                </div>
                @include('layouts._contact',['contact_us'=>$common_data['config']])
            </div>

            <div class="col-lg-9 py-4 px-4" style="color: #484848">
                @if(count($lists))
                    @foreach($lists as $key => $list)
                        @if($key%2)
                            <div class="row py-3">
                                <div class="col-md-5">
                                    <img src="{{ asset('uploads/'.$list->images) }}" class="img-fluid">
                                </div>
                                <div class="col-md-7">
                                    <h4 style="color: red" class="py-2" >{{ $list->title }}</h4>
                                    <p style="line-height: 2rem; text-indent: 2em">{{ $list->introduction }}</p>
                                </div>
                            </div>
                        @else
                            <div class="row py-3">
                                <div class="col-md-7">
                                    <h4 style="color: red" class="py-2" >{{ $list->title }}</h4>
                                    <p style="line-height: 2rem; text-indent: 2em">{{ $list->introduction }}</p>
                                </div>
                                <div class="col-md-5">
                                    <img src="{{ asset('uploads/'.$list->images) }}" class="img-fluid">
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    没有更多的内容
                @endif
            </div>

        </div>
    </div>
    <!--content end-->


@endsection