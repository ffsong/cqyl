
@extends('layouts.app')

@section('title','典型客户 | 重庆悦灵安全技术咨询有限公司')

@section('description','典型客户|重庆悦灵安全技术咨询有限公司')

@section('main')

    @include('layouts._breadcrumb',['title'=>'典型客户'])

    <!--content start-->
    <div class="home-customer" >
        <div class="container py-5" >
            <div class="card-deck">
                @foreach($customer_data as $customer)
                    <div class="card my-1 mx-auto">
                        <img class="card-img-top img-fluid" src="./images/customer1.jpg" alt="Card image cap">
                        <div class="customer-text">
                            <p class="city" style="padding-top: 6rem">{{ $customer->title }}</p>
                            <p class="title" style="padding-bottom: 0.8rem">{{ $customer->introduction }}</p>
                            <p class="content">服务内容：{{ $customer->content }}</p>
                        </div>
                    </div>
                @endforeach
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