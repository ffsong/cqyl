@extends('layouts.app')

@section('title',$configs->website)

@section('content')
    <div class="five">

        <table width="1100" border="0" cellspacing="0" cellpadding="0">

            <tr>

                <td width="834" align="left" valign="top"><div class="one">

                        <div class="intro">

                            <div class="intro_L">{{ $articles['introduction'][0]['title'] }}</div>

                            <div class="intro_R"><a href="{{ route('show',['category_id'=>8,'article_id'=>3]) }}">更多 >></a></div>

                            <div class="clear"></div>

                        </div>

                        <div class="intro_t">
                            {{ str_limit($articles['introduction'][0]['introduction'],'260','...')  }}
                        </div>

                    </div>

                    <div class="w13">&nbsp;</div>

                    <div class="two">

                        <div class="news">

                            <div class="news_L">公司新闻</div>

                            <div class="news_R"><a href="{{ route('articles',['category_id'=>1]) }}">更多 >></a></div>

                            <div class="clear"></div>

                        </div>

                        <div class="news_t">

                            <table width="100%" border="0" cellspacing="0" cellpadding="0">

                                <tr>

                                    <td width="220" align="left" valign="top"><div>

                                            <!-- 代码 开始 -->

                                            <div id="fsD1" class="focus" >

                                            {{-- 新闻图片--}}
                                                @if(count($articles['news']) )
                                                    @foreach($articles['news'] as $new)
                                                        <div id="D1pic1" class="fPic">
                                                            <div class="fcon" style="display: none;">
                                                                <a target="_blank" href="{{ route('show',['category_id'=>1,'article_id'=>$new['id']]) }}">
                                                                    <img src="{{ asset('/uploads/'.$new['images']) }}" style="opacity: 1; ">
                                                                </a>
                                                                <span class="shadow">
                                                                    <a target="_blank" href="{{ route('show',['category_id'=>1,'article_id'=>$new['id']]) }}">{{str_limit($new['title'],'26','')}}</a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif

                                                <div class="fbg">

                                                    <div class="D1fBt" id="D1fBt">

                                                        @if(count($articles['news']) )
                                                            @foreach($articles['news'] as $new)
                                                                <a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>*</i></a>
                                                            @endforeach
                                                        @endif


                                                        {{--<a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>*</i></a>--}}

                                                        {{--<a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>*</i></a>--}}
                                                    </div>

                                                </div>

                                                <!--    <span class="prev"></span>

                                                    <span class="next"></span>-->

                                                </div>

                                                                <script type="text/javascript">

                                                                    Qfast.add('widgets', { path: "http://www.faaqjs.com/template/fanan/js/terminator2.2.min.js", type: "js", requires: ['fx'] });

                                                                    Qfast(false, 'widgets', function () {

                                                                        K.tabs({

                                                                            id: 'fsD1',   //焦点图包裹id

                                                                            conId: "D1pic1",  //** 大图域包裹id

                                                                            tabId:"D1fBt",

                                                                            tabTn:"a",

                                                                            conCn: '.fcon', //** 大图域配置class

                                                                            auto: 1,   //自动播放 1或0

                                                                            effect: 'fade',   //效果配置

                                                                            eType: 'click', //** 鼠标事件

                                                                            pageBt:true,//是否有按钮切换页码

                                                                            bns: ['.prev', '.next'],//** 前后按钮配置class

                                                                            interval: 3000  //** 停顿时间

                                                                        })

                                                                    })

                                                                </script>

                                                                <!-- 代码 结束 --></div></td>

                                    <td align="left" valign="top"><div class="notice">

                                        <ul>
                                            @if(count($articles['news']) )
                                                @foreach($articles['news'] as $new)
                                                    <li><a href="{{ route('show',['category_id'=>1,'article_id'=>$new['id']]) }}" title="{{ $new['title'] }}">
                                                            <div style="float:left; padding-left:10px;background:url('./images/point.jpg') left no-repeat;">
                                                                {{ str_limit($new['title'],'30','...') }}
                                                            </div>
                                                            <div style="float:right">[{{ str_limit($new['created_at'],'10','') }}]</div>
                                                            <div class="clear"></div>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                        <div class="clear"></div>

                                        </div></td>

                                </tr>

                            </table>

                        </div>

                    </div>

                    <div class="clear"></div>

                    <div style="padding-top:15px;"></div>

                    <div class="one">

                        <div class="intro">

                            <div class="intro_L">{{ $articles['contact'][0]['title'] }}</div>

                            <div class="intro_R"><a href="{{ route('show',['category_id'=>10,'article_id'=>4]) }}">更多 >></a></div>

                            <div class="clear"></div>

                        </div>

                        <div class="intro_t">
                            {!! $articles['contact'][0]['content'] !!}
                        </div>

                    </div>

                    <div class="w13">&nbsp;</div>

                    {{--通知公告--}}
                    <div class="two">

                        <div class="news">

                            <div class="news_L">通知公告</div>

                            <div class="news_R"><a href="{{ route('articles',['category_id'=>2]) }}">更多 >></a></div>

                            <div class="clear"></div>

                        </div>

                        <div class="news_t">

                            <div class="notice">

                                <ul>
                                    @if(count($articles['notice']))
                                        @foreach($articles['notice'] as $notice)
                                            <li>
                                                <a href="{{ route('show',['category_id'=>2,'article_id'=>$notice['id']]) }}"
                                                   title="{{$notice['title']}}">
                                                    <div style="float:left; padding-left:10px;background:url('./images/point.jpg') left no-repeat;">{{ str_limit($notice['title'],'50','...') }}</div>
                                                    <div style="float:right">[{{ str_limit($notice['created_at'],'10','') }}]</div>
                                                    <div class="clear"></div>
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>

                                <div class="clear"></div>

                            </div>

                        </div>

                    </div></td>

                <td width="266" align="left" valign="top"><div><img src="{{ asset('picture/yellow_title.jpg') }}" /></div>

                    <div class="yellow_b">

                        <div class="yellow_r">

                            <ul>
                                @if($categorys['cateaory_right'])
                                    @foreach($categorys['cateaory_right'] as $cateaory_right)
                                        <li>
                                            <a href="{{ route('articles',['articles'=>$cateaory_right['id']]) }}">{{ $cateaory_right['title'] }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>

                            <div class="clear"></div>

                        </div>

                    </div></td>

            </tr>

        </table>

    </div>

    <div class="h15"></div>
@stop

@section('main')
    <!-- banner open  -->

    <div class="ban1">

        <!-- 代码 开始 -->

        <div class="www51buycom">

            <ul class="51buypic">
                <li><img src=" {{ asset('picture/1.jpg') }}" /></li>
            </ul>
        </div>

        <!-- 代码 结束 -->

    </div>

    <div class="h15"></div>

    <!-- banner end  -->



    <!--four open-->

    <div class="main">

        <div class="four">

            <div class="one">

                <div class="intro">

                    <div class="intro_L">公司邮箱</div>

                    <div class="clear"></div>

                </div>

                <div class="intro_p">

                    <table width="100%" border="0" cellspacing="0" cellpadding="0">

                        <tr>
                            <td width="31%" align="left" valign="top">
                                <p>
                                    公司邮箱
                                </p>
                                <p>
                                    E-mail：<a href="mailto:zhengq@izpje.com">{{ $configs['email'] }}</a>
                                </p>
                            </td>

                            <td width="31%" align="right" valign="top"><img src="{{ asset('picture/post.jpg') }}" /></td>

                        </tr>

                    </table>

                </div>

            </div>

            <div class="w13">&nbsp;</div>

            <div class="seven"><a href="http://www.faaqjs.com/member/member.php"><img src="{{ asset('picture/seven.jpg') }}" /></a></div>

            <div class="w13">&nbsp;</div>

            <div class="link">

                <div class="link_top">友情链接</div>

                <div class="intro_p">
                    @if(count($links))
                        @foreach($links as $link)
                            <a href="{{ $link['url'] }}" style="margin-right:10px;" target="_blank">
                                {{ $link['name'] }}
                            </a>
                        @endforeach
                    @endif
                </div>

            </div>

            <div class="clear"></div>

            <div class="h15"></div>

            <div class="equipment">

                <table width="100%" border="0" cellspacing="0" cellpadding="0">


                    <tr>

                        <td align="left" valign="top" class="equipment_L">设备展示</td>

                        <td width="60" align="left" valign="top" class="equipment_R">
                            <a href="{{ route('articles',['category_id'=>9]) }}">更多 >></a>
                        </td>

                    </tr>

                </table>

            </div>

            <div class="equipment_t">

                @if(count($articles['equipment']))
                    @foreach($articles['equipment'] as $equipment)
                        <div class="equi_one">
                            <div class="equi_img">
                                <a href="{{ route('show',['category_id'=>9,'article_id'=>$equipment['id']])  }}">
                                    <img src="{{ asset( '/uploads/'.$equipment['images']) }}" />
                                </a>
                            </div>
                            <div class="equi_text">{{ str_limit($equipment['title'],'20','') }}</div>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="h15"></div>

        </div>

    </div>

    <!--four end-->
@stop
