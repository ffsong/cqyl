
@extends('layouts.app')

@section('title','典型客户 | 重庆悦灵安全技术咨询有限公司')

@section('description','典型客户|重庆悦灵安全技术咨询有限公司')

@section('main')

    @include('layouts._breadcrumb',['title'=>'典型客户'])

    <!--content start-->

    <div class="home-customer" >
        <div class="container py-5" >
            <div class="card-deck">
                <div class="card my-1 mx-auto">
                    <img class="card-img-top img-fluid" src="./images/customer1.jpg" alt="Card image cap">
                    <div class="customer-text">
                        <p class="city" style="padding-top: 3rem">重庆市江北区</p>
                        <p class="title" style="padding-bottom: 0.8rem">复盛镇人民政府</p>
                        <p class="content">服务内容：政府部门安全技术支撑</p>
                        <a class="btn btn-outline-light btn-sm more my-5" href="" role="button">&nbsp;&nbsp; 了解更多 &nbsp;&nbsp;</a>
                    </div>
                </div>
                <div class="card my-1  mx-auto">
                    <img class="card-img-top img-fluid" src="./images/customer_default.jpg" alt="Card image cap">
                    <div class="customer-text">
                        <p class="city" style="padding-top: 3rem">重庆市江北区</p>
                        <p class="title" style="padding-bottom: 0.8rem">复盛镇人民政府</p>
                        <p class="content">服务内容：政府部门安全技术支撑</p>
                        <a class="btn btn-outline-light btn-sm more my-5" href="" role="button">&nbsp;&nbsp; 了解更多 &nbsp;&nbsp;</a>
                    </div>
                </div>
                <div class="card my-1  mx-auto">
                    <img class="card-img-top img-fluid" src="./images/customer1.jpg" alt="Card image cap">
                    <div class="customer-text">
                        <p class="city" style="padding-top: 3rem">重庆市江北区</p>
                        <p class="title" style="padding-bottom: 0.8rem">复盛镇人民政府</p>
                        <p class="content">服务内容：政府部门安全技术支撑</p>
                        <a class="btn btn-outline-light btn-sm more  my-5" href="" role="button">&nbsp;&nbsp; 了解更多 &nbsp;&nbsp;</a>
                    </div>
                </div>
                <div class="card my-1  mx-auto">
                    <img class="card-img-top img-fluid" src="./images/customer1.jpg" alt="Card image cap">
                    <div class="customer-text">
                        <p class="city" style="padding-top: 3rem">重庆市江北区</p>
                        <p class="title" style="padding-bottom: 0.8rem">复盛镇人民政府</p>
                        <p class="content">服务内容：政府部门安全技术支撑</p>
                        <a class="btn btn-outline-light btn-sm more my-5" href="" role="button">&nbsp;&nbsp; 了解更多 &nbsp;&nbsp;</a>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <nav class="mx-auto" aria-label="Page navigation example">
                    <ul class="pagination ">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
    </div>
    <!--content end-->


@endsection