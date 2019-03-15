
@extends('layouts.app')

@section('title','业务范围 | 重庆悦灵安全技术咨询有限公司')

@section('description','业务范围|重庆悦灵安全技术咨询有限公司')

@section('main')

    @include('layouts._breadcrumb',['title'=>'业务范围'])

    <!--content start-->
    <!--大屏内容-->
    <div class="container py-4 d-none d-lg-block" >
        <div class="row ">
            <div class="col-lg-3 new-category">
                <div class="nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    @foreach($business_data as $key=> $business)
                        <a class="nav-link my-1 py-3 @if($key == 0) active @endif " id="v-pills-{{ $key }}-tab" data-toggle="pill"
                           href="#v-pills-{{ $key }}" role="tab" aria-controls="v-pills-{{ $key }}"  aria-selected="true">
                            {{ $business->title }}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-9 py-4 px-4 new-list">
                <div class="tab-content" id="v-pills-tabContent">
                    @foreach($business_data as $key=> $business)
                        <div class="tab-pane fade new-list @if($key == 0) show  active @endif s" id="v-pills-{{ $key }}"
                             role="tabpanel"
                             aria-labelledby="v-pills-{{ $key }}-tab">{!! $business->content !!}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--大屏内容-->

    <!--小屏内容-->
    <div class="container pt-3 pb-4 d-lg-none new-list-md">
        <div id="accordion">
            @foreach($business_data as $key=> $business)
                <div class="card">
                    <div class="card-header" id="heading1">
                        <h5 class="mb-0">
                            <button class="btn btn-link btn-xs btn-block" style="color: #484848"  data-toggle="collapse"
                                    data-target="#collapse{{ $key }}"
                                    @if($key == 0) aria-expanded="true" @else aria-expanded="false" @endif
                                    aria-controls="collapse{{ $key }}">
                                {{ $business->title }}
                            </button>
                        </h5>
                    </div>

                    <div id="collapse{{ $key }}" class="collapse @if($key == 0) show  @endif " aria-labelledby="heading{{ $key }}"
                         data-parent="#accordion">
                        <div class="card-body">
                            {!! $business->content !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!--小屏内容-->

    <!--content end-->


@endsection