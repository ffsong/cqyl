
@extends('layouts.app')

@section('title','联系我们 | 重庆悦灵安全技术咨询有限公司')

@section('description','联系我们 | 重庆悦灵安全技术咨询有限公司')

@section('main')

    @include('layouts._breadcrumb',['title'=>'联系我们'])
    <div class="container" >
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    </div>
    <!--content start-->
    <!--大屏内容-->
    <div class="container py-4 d-none d-lg-block" >

        <div class="row ">

            <div class="col-lg-3 new-category text-center">

                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link my-1 py-3
                      @empty ($errors->any())
                            active
                      @endempty

                        " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
                       role="tab" aria-controls="v-pills-home"
                       @if ($errors->any())
                            aria-selected="false"
                       @else
                       aria-selected="true"
                       @endif

                    >联系我们</a>

                    <a class="nav-link my-1 py-3
                      @if ($errors->any())
                            active
                      @endif
                            " id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                       role="tab" aria-controls="v-pills-profile"
                       @if ($errors->any())
                            aria-selected="true"
                       @else
                            aria-selected="false"
                       @endif
                    >在线留言</a>

                </div>
            </div>
            <div class="col-lg-9 py-4 px-4 new-list">

                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade
                     @empty ($errors->any()) show active @endempty" id="v-pills-home" role="tabpanel"
                         aria-labelledby="v-pills-home-tab">
                            {!! $contact_data->content !!}
                    </div>

                    <div class="tab-pane fade @if ($errors->any()) show active @endif" id="v-pills-profile" role="tabpanel"
                         aria-labelledby="v-pills-profile-tab">
                        <form style="    width: 60%;margin: 0 auto;" method="post" action="{{ route('message') }}">
                            @csrf
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
                                <label for="captcha" class="col-md-2 col-form-label text-md-right">验证码</label>
                                <div class="col-md-10">
                                    <input id="captcha" class="form-control{{ $errors->has('captcha') ? ' is-invalid' : '' }}" name="captcha" required>

                                    <img class="thumbnail captcha mt-3 mb-2" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">

                                    @if ($errors->has('captcha'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('captcha') }}</strong>
                                      </span>
                                    @endif
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
    <!--大屏内容-->

    <!--小屏内容-->
    <div class="container pt-3 pb-4 d-lg-none new-list-md">
        <div id="accordion">
            <div class="card">
                <div class="card-header" id="heading1">
                    <h5 class="mb-0">
                        <button class="btn btn-link btn-xs btn-block" style="color: #484848" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                            联系我们
                        </button>
                    </h5>
                </div>

                <div id="collapse1" class="collapse show"  aria-labelledby="heading1" data-id="1" data-parent="#accordion">
                    <div class="card-body">
                        {!! $contact_data->content !!}
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="heading2">
                    <h5 class="mb-0">
                        <button class="btn btn-link btn-xs btn-block" style="color: #484848" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                            在线留言
                        </button>
                    </h5>
                </div>

                <div id="collapse2" class="collapse" aria-labelledby="heading2" data-id="1" data-parent="#accordion">
                    <div class="card-body">
                        <form style="margin: 0 auto;" method="post" action="{{ route('message') }}" >
                            @csrf
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">您的姓名</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" required >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">您的电话</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="phone" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">留言内容</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="content" aria-label="With textarea" required></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="captcha" class="col-sm-2 col-form-label text-sm-right"> 验证码</label>
                                <div class="col-sm-10">
                                    <input id="captcha" class="form-control{{ $errors->has('captcha') ? ' is-invalid' : '' }}" name="captcha" required>

                                    <img class="thumbnail captcha mt-3 mb-2" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">

                                    @if ($errors->has('captcha'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('captcha') }}</strong>
                                      </span>
                                    @endif
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