
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
                <nav class="nav text-center flex-column">
                    <a class="nav-link my-1 py-3 active" href="#">政府及园区服务</a>
                    <a class="nav-link my-1 py-3" href="#">工矿企业/交通运输企业等</a>
                    <a class="nav-link my-1 py-3" href="#">学校/景区/商场/医院/养老院 等人员密集场所</a>
                </nav>
            </div>
            <div class="col-lg-9 py-4 px-4 new-list">

                1、安全风险辨识评估
                2、应急资源管理
                3、应急物资及设备规划
                4、应急预案编制
                5、应急演练策划与实施
                6、事故应急处置专家

            </div>
        </div>
    </div>
    <!--大屏内容-->

    <!--小屏内容-->
    <div class="container pt-3 pb-4 d-lg-none new-list-md">
        <div id="accordion">
            <div class="card">
                <div class="card-header" id="heading1">
                    <h5 class="mb-0">
                        <button class="btn btn-link btn-xs btn-block" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                            政府及园区服务
                        </button>
                    </h5>
                </div>

                <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-id="1" data-parent="#accordion">
                    <div class="card-body">
                        1、安全风险辨识评估 2、应急资源管理 3、应急物资及设备规划 4、应急预案编制 5、应急演练策划与实施 6、事故应急处置专家
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="heading2">
                    <h5 class="mb-0">
                        <button class="btn btn-link btn-xs btn-block" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                            工矿企业/交通运输企业等
                        </button>
                    </h5>
                </div>

                <div id="collapse2" class="collapse" aria-labelledby="heading2" data-id="1" data-parent="#accordion">
                    <div class="card-body">
                        1、安全风险辨识评估 2、应急资源管理 3、应急物资及设备规划 4、应急预案编制 5、应急演练策划与实施 6、事故应急处置专家
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="heading3">
                    <h5 class="mb-0">
                        <button class="btn btn-link btn-xs btn-block" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            学校/景区/商场/医院/养老院 等人员密集场所
                        </button>
                    </h5>
                </div>

                <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
                    <div class="card-body">
                        1、安全风险辨识评估 2、应急资源管理 3、应急物资及设备规划 4、应急预案编制 5、应急演练策划与实施 6、事故应急处置专家
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--小屏内容-->

    <!--content end-->


@endsection