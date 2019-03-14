
@extends('layouts.app')

@section('title','联系我们 | 重庆悦灵安全技术咨询有限公司')

@section('description','联系我们 | 重庆悦灵安全技术咨询有限公司')

@section('main')

    @include('layouts._breadcrumb',['title'=>'联系我们'])

    <!--content start-->
    <!--大屏内容-->
    <div class="container py-4 d-none d-lg-block" >
        <div class="row ">
            <div class="col-lg-3 new-category">
                <nav class="nav text-center flex-column">
                    <a class="nav-link my-1 py-3 " href="#">联系我们</a>
                    <a class="nav-link my-1 py-3 active" href="#">在线留言</a>
                </nav>
            </div>
            <div class="col-lg-9 py-4 px-4 new-list">
                <form style="    width: 60%;margin: 0 auto;">
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">您的姓名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">您的电话</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="phone" id="phone" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">留言内容</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="content" aria-label="With textarea" ></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">提交</button>
                            <button type="reset" class="btn btn-primary" style="float:right">重置</button>
                        </div>
                    </div>

                </form>
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
                            联系我们
                        </button>
                    </h5>
                </div>

                <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-id="1" data-parent="#accordion">
                    <div class="card-body">
                        重庆悦灵安全技术咨询有限公司 　　
                        地址：重庆市渝北区广告产业园 　　
                        业务联系电话：023-67096742　
                        值班电话：023-67096742
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="heading2">
                    <h5 class="mb-0">
                        <button class="btn btn-link btn-xs btn-block" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                            在线留言
                        </button>
                    </h5>
                </div>

                <div id="collapse2" class="collapse" aria-labelledby="heading2" data-id="1" data-parent="#accordion">
                    <div class="card-body">
                        <form style="margin: 0 auto;" action="" >
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">您的姓名</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name"  >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">您的电话</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="phone" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">留言内容</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="content" aria-label="With textarea" ></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">提交</button>
                                    <button type="reset" class="btn btn-primary" style="float:right">重置</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--小屏内容-->

    <!--content end-->

@endsection