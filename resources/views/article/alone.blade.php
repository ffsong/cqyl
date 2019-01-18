@extends('layouts.app')
@section('title', $category_left[0]['title'])

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
                            <a class="block" href="{{ route('articles',['category_id'=>$category['id']]) }}" >
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
            @if(count($article))
            <div class="right_mid">
                <div class="right_tt">
                    <div class="xinw_t">

                        {!! $article['content'] !!}

                    </div>
                    <div style="margin-top: 20px;">
                        @if($article['enclosure'])
                            <a style="color: red" href="{{ route('down',['id'=>$article['id']]) }}">请下载附件</a>

                        @endif  
                    </div>
                </div>
            </div>

            @else
            <div class="not-found">访问内容不存在</div>
            @endif

        </div>

        <div class="clear"></div>
    </div>

    <!--seb end-->
@stop