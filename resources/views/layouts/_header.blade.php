<script language=Javascript>
    function time(){
        //获得显示时间的div
        t_div = document.getElementById('showtime');
        var now=new Date()
        var week;
        if(new Date().getDay()==0)
            week="星期日"
        if(new Date().getDay()==1)
            week="星期一"
        if(new Date().getDay()==2)
            week="星期二"
        if(new Date().getDay()==3)
            week="星期三"
        if(new Date().getDay()==4)
            week="星期四"
        if(new Date().getDay()==5)
            week="星期五"
        if(new Date().getDay()==6)
            week="星期六"
        //替换div内容
        t_div.innerHTML = "今天是"+now.getFullYear()
            +"年"+(now.getMonth()+1)+"月"+now.getDate()
            +"日"+""+week;
        //等待一秒钟后调用time方法，由于settimeout在time方法内，所以可以无限调用
        setTimeout(time,1000);
    }
</script>  <!--top open -->
<div class="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td width="790" align="left" valign="top" class="welcom">{{ $configs['website'] }}</td>
            <td width="180" align="left" valign="top" class="lan"><div id="showtime"></div></td>
        </tr>
    </table>
</div>
<!--top end -->
<!--flash open-->
<div>
    <img class="banner" src="{{ asset('picture/banner.png') }}" />

    {{--<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="1110" height="175">--}}
        {{--<param name="movie" value="http://www.faaqjs.com/template/fanan/images/main.swf" />--}}
        {{--<param name="quality" value="high" />--}}
        {{--<param name="wmode" value="transparent">--}}
        {{--<embed src="{{asset('flash/main.swf')}}" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="1110" height="175" wmode="transparent"></embed>--}}
    {{--</object>--}}
</div>
<!--flash end-->
<!--nav open-->
<div class="nav">
    <ul>
        <li class="li_1"><a href="/">首页</a></li>
        @if(count($categorys['cateaory_top']))

            @foreach($categorys['cateaory_top'] as $news)
                <li class="li_1"><a href="{{ route('articles',['category_id'=>$news['id']]) }}">{{ $news['title'] }}</a></li>
            @endforeach

        @endif


        <div class="clear"></div>
    </ul>
</div>
<!--nav end-->

<div class="h15"></div>

<!--nav end-->