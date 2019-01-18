@extends('layouts.app')
@section('title', $category_left[0]['title'])
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <style type="text/css">
        .welcom,.lan{ font-size: 12px ; padding-top: 8px}
    </style>

@section('content')
    <!--seb open-->
    <div class="seb">
        <div class="box1">
            <div class="nav_top">
                {{ $category_left[0]['title'] }}
            </div>
            <div class="nav_mid">
                <div class="nav_L">
                    <ul>
                        @foreach($category_left as $category)
                        <li>
                            <a  class="block" href="{{ route('articles',['category_id'=>$category['id']]) }}" >
                           {{ $category['title'] }}
                            </a>
                        </li>
                        @endforeach

                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="tel_L">联系我们</div>
            <div class="tel_b">
                <div class="tel_t">
                 {!! $contact[0]['content'] !!}

                </div>
            </div>
        </div>
        <div class="w15">&nbsp;</div>
        <div class="box2">
            <div class="right_top">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="200" align="left" valign="top" class="right_l">
                            {{ $category_left[0]['title'] }}
                        </td>
                        <td align="right" valign="top" class="right_r"> <a href="/">首页</a> > <a href="{{ route('articles',['category_id'=>$category_left[0]['id']]) }}">{{ $category_left[0]['title'] }}</a></td>
                    </tr>
                </table>
            </div>
            <div class="right_mid">
                <div class="right_t">
                    <div class="xinw">
                        <ul>

                            @foreach ($article_lists as $lists)
                                <li><a href="{{route('show',['category_id'=>$lists['cateaory_id'],'article_id'=>$lists['id']])}}">
                                        <div style="float:left;
                                         padding-left:10px;background:url('/images/point_y.jpg') left no-repeat;">
                                            {{ str_limit($lists['title'],'50','...')  }}
                                        </div>
                                        <div style="float:right">
                                        [{{ str_limit($lists['created_at'],'10','') }}]
                                        </div>
                                        <div class="clear"></div>
                                    </a>
                                </li>

                            @endforeach

                        </ul>
                        <div class="clear"></div>

                        <div style="margin:20px 0;">

    {{ $article_lists->links() }}

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>

    <!--seb end-->
@stop