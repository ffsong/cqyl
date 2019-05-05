
@extends('layouts.app')

@section('title','企业文化-'.$common_data['config']['website'])

@section('description','企业文化-'.$common_data['config']['website'])

@section('main')

    @include('layouts._breadcrumb',['title'=>'企业文化'])

    <!--content start-->
    <div class="container my-4 text-center" >

        {{--企业宗旨--}}
        <div class="text-center">
            <div class=" row mt-3">
                <div class="col-md-6">
                    {!! $culture['ep']['content'] !!}
                </div>
                <div class="d-none d-md-block col-md-6">
                    <img src="{{ asset('uploads/'.$culture['ep']['image']) }}" alt="{{ $culture['ep']['title'] }}" class="img-fluid" />
                </div>
            </div>
        </div>
        {{--企业宗旨--}}

        <hr/>

        {{--职工园地--}}
        <div class="py-5 text-center">
            <div class="text-center">
                <div class="row">
                    @foreach($culture['sg'] as $value)
                        <div class="col-6 col-md-4 px-1 my-3">
                            <img src="{{ asset('uploads/'.$value['image']) }}" title="{{ $value['title'] }}" alt="{{ $value['title'] }}" class="img-fluid" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{--职工园地--}}

        <hr/>

        {{--职工风采--}}
        <div class=" pb-5 text-center" id="foo" >
            <div class="text-center">
                <div class="row">
                    @foreach($culture['ed'] as $value)
                        <div class="col-6 col-md-4 px-1 my-3">
                            <img src="{{ asset('uploads/'.$value['image']) }}" title="{{ $value['title'] }}" alt="{{ $value['title'] }}" class="img-fluid" />
                        </div>
                    @endforeach
                </div>
                <div class="row mt-3">
                    <nav class="mx-auto" aria-label="Page navigation example">
                        {{ $culture['ed']->fragment('foo')->links() }}
                    </nav>
                </div>
            </div>
        </div>
        {{--职工风采--}}
    </div>
    <!--content end-->

@endsection