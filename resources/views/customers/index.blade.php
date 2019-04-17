
@extends('layouts.app')

@section('title','行业案例-'.$common_data['config']['website'])

@section('description','行业案例-'.$common_data['config']['website'])

@section('main')

    @include('layouts._breadcrumb',['title'=>'行业案例'])

    <!--content start-->
    <div class="home-customer" >
        <div class="container py-5" >
            <div class="card-deck">
                <div class="row customer-list">

                    @foreach($customer_data as $value)
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="{{ route('industry',['id'=>$value->id]) }}" >
                                <div>
                                    <img src="{{ asset('uploads/'.$value->images) }}" alt="{{ $value->title }}" class="img-fluid">
                                </div>
                                <div>
                                    <div class="pt-2 pb-1">
                                        <h6 class="text-center">{{ $value->title }}</h6>
                                    </div>
                                    <p class="text-center" >{{ $value->introduction }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="row mt-3">
                <nav class="mx-auto" aria-label="Page navigation example">
                    {{ $customer_data->links() }}
                </nav>
            </div>

        </div>
    </div>
    <!--content end-->


@endsection