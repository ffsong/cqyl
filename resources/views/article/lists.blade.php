@extends('layouts.app')
@section('title', '首页')

@section('content')
    <!--seb open-->
    <div class="seb">
        <div class="box1">
            <div class="nav_top">
                公司新闻
            </div>
            <div class="nav_mid">
                <div class="nav_L">
                    <ul>
                        <li>
                            <a href="http://www.faaqjs.com/article/article.php?id=5" >
                            公司新闻
                            </a>
                        </li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="tel_L">联系我们</div>
            <div class="tel_b">
                <div class="tel_t">
                    <p>
	                    <span style="line-height: 24px; font-family: 'Microsoft Yahei'; color: rgb(0,0,0)">
                            宁波繁安安全技术服务有限公司<br />
                            地址：浙江省宁波市经济开发区北海路365号<br />
                            业务联系电话：0574-8650-5956<br />
                            值班电话：0574-8650-5936<br />
                            QQ ：繁安第三方技术服务295824242
                        </span>
                    </p>
                    <p>
                        <span style="line-height: 24px; font-family: 'Microsoft Yahei'; color: rgb(0,0,0)">
                            &nbsp;&nbsp;&nbsp;
                        </span>
                    </p>

                </div>
            </div>
        </div>
        <div class="w15">&nbsp;</div>
        <div class="box2">
            <div class="right_top">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="200" align="left" valign="top" class="right_l">
                            公司新闻
                        </td>
                        <td align="right" valign="top" class="right_r"> <a href="http://www.faaqjs.com/">首页</a> > <a href="http://www.faaqjs.com/article/article.php?id=5">公司新闻</a></td>
                    </tr>
                </table>
            </div>
            <div class="right_mid">
                <div class="right_t">
                    <div class="xinw">
                        <ul>
                            <li><a href="{{route('show',['category_id'=>1,'article_id'=>2])}}">
                                    <div style="float:left;
                                     padding-left:10px;background:url('/images/point_y.jpg') left no-repeat;">
                                        宁波市以“四化联动”破解危化品安全综合治理难题
                                    </div>
                                    <div style="float:right">[2018-12-03]</div>
                                    <div class="clear"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="clear"></div>

                        <div style="margin:20px 0;">
                            <span class="off">首页</span><span class="off">上一页</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>

    <!--seb end-->
@stop