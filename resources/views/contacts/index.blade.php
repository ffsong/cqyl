
@extends('layouts.app')

@section('title','联系我们-'.$common_data['config']['website'])

@section('description','联系我们-'.$common_data['config']['website'])

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
            <div class="col-lg-9 py-4 px-4">

                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade
                     @empty ($errors->any()) show active @endempty" id="v-pills-home" role="tabpanel"
                         aria-labelledby="v-pills-home-tab">
                            {!! $contact_data->content !!}

                        <div class="row">
                            <!--地图 start-->
                            <script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=c36xsnTC0HTLcb9DNtpknAoSvGLbBS7h&s=1"></script>
                            <script type="text/javascript" src="https://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.js"></script>
                            <link rel="stylesheet" href="https://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.css" />


                            <div id="allmap1" class="baidu-maps" style=" width: 100%;height: 300px"></div>

                            <script type="text/javascript">
                                // 百度地图API功能
                                var map1 = new BMap.Map('allmap1');
                                var poi1 = new BMap.Point(106.615322,29.654299);
                                map1.centerAndZoom(poi1, 16);
                                map1.enableScrollWheelZoom();

                                var content1 = '<div style="margin:0;line-height:20px;padding:2px;">' +
                                    '<img src="{{ asset('images/log.png') }}" alt="" style="float:right;zoom:1;overflow:hidden;width:100px;height:100px;margin-left:3px;"/>' +
                                    '地址：{{ $common_data['config']['address'] }}<br/>电话：{{ $common_data['config']['phone'] }}<br/>简介：{{ $common_data['config']['website'] }}' +
                                    '</div>';

                                //创建检索信息窗口对象
                                var searchInfoWindow1 = null;
                                searchInfoWindow1 = new BMapLib.SearchInfoWindow(map1, content1, {
                                    title  : "{{ $common_data['config']['website'] }}",      //标题
                                    width  : 290,             //宽度
                                    height : 105,              //高度
                                    panel  : "panel",         //检索结果面板
                                    enableAutoPan : true,     //自动平移
                                    searchTypes   :[
                                        BMAPLIB_TAB_SEARCH,   //周边检索
                                        BMAPLIB_TAB_TO_HERE,  //到这里去
                                        BMAPLIB_TAB_FROM_HERE //从这里出发
                                    ]
                                });
                                var marker1 = new BMap.Marker(poi1); //创建marker对象
                                marker1.enableDragging(); //marker可拖拽
                                marker1.addEventListener("click", function(e){
                                    searchInfoWindow1.open(marker1);
                                })
                                map1.addOverlay(marker1); //在地图中添加marker
                            </script>

                            <!--地图 end-->
                        </div>
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
                        <div class="row">
                            <!--地图 start-->
                            <script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=c36xsnTC0HTLcb9DNtpknAoSvGLbBS7h&s=1"></script>
                            <script type="text/javascript" src="https://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.js"></script>
                            <link rel="stylesheet" href="https://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.css" />

                            <div id="allmap2" class="baidu-maps" style=" width: 100%;height: 300px"></div>

                            <script type="text/javascript">
                                // 百度地图API功能
                                var map = new BMap.Map('allmap2');
                                var poi = new BMap.Point(106.615322,29.654299);
                                map.centerAndZoom(poi, 16);
                                map.enableScrollWheelZoom();

                                var content = '<div style="margin:0;line-height:20px;padding:2px;">' +
                                    '<img src="{{ asset('images/log.png') }}" alt="" style="float:right;zoom:1;overflow:hidden;width:100px;height:100px;margin-left:3px;"/>' +
                                    '地址：{{ $common_data['config']['address'] }}<br/>电话：{{ $common_data['config']['phone'] }}<br/>简介：{{ $common_data['config']['website'] }}' +
                                    '</div>';

                                //创建检索信息窗口对象
                                var searchInfoWindow = null;
                                searchInfoWindow = new BMapLib.SearchInfoWindow(map, content, {
                                    title  : "{{ $common_data['config']['website'] }}",      //标题
                                    width  : 290,             //宽度
                                    height : 105,              //高度
                                    panel  : "panel",         //检索结果面板
                                    enableAutoPan : true,     //自动平移
                                    searchTypes   :[
                                        BMAPLIB_TAB_SEARCH,   //周边检索
                                        BMAPLIB_TAB_TO_HERE,  //到这里去
                                        BMAPLIB_TAB_FROM_HERE //从这里出发
                                    ]
                                });
                                var marker = new BMap.Marker(poi); //创建marker对象
                                marker.enableDragging(); //marker可拖拽
                                marker.addEventListener("click", function(e){
                                    searchInfoWindow.open(marker);
                                })
                                map.addOverlay(marker); //在地图中添加marker
                            </script>
                            <!--地图 end-->
                        </div>
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