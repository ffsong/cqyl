<!--footer start-->
    <footer class=" footer">
        {{--<nav class="nav navbar-fixed-bottom" id="footer">        </nav>--}}


        <div class="container text-center ">
                <div class="d-none d-lg-block" style="position: absolute; width: 100px">
                    <img src="{{ asset('/uploads/'.$config['wechat_qrcode']) }}" style="width: 70px" class="pt-4">
                    <p class=" pt-1 mb-0">关注微信公众号</p>
                </div>
                <div class="row">
                    <div class="col-12 pt-5">
                        <p>
                            联系电话：{{ $config['phone'] }} 电子邮件：{{ $config['email'] }} 地 址：{{ $config['address'] }}
                        </p>
                        <p>
                            ©{{ $config['info'] }}
                        </p>
                    </div>
                </div>
            </div>
    </footer>
<!--footer end-->