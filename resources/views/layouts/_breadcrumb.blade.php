<!--breadcrumb start-->
<div class="breadcrumb-bg">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-text">
                <li class="breadcrumb-item"><a href="{{ route('/') }}">首页</a></li>
                @if(isset($nav))
                    <li class="breadcrumb-item " aria-current="page">
                        <a href={{ route('news',['category_id'=>6]) }}>
                            公司新闻
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href={{ route('news',['category_id'=>$nav['category_id']]) }}>
                            {{ $nav['category_title'] }}
                        </a>
                    </li>
                    {{--<li class="breadcrumb-item active" aria-current="page">{{ $nav['article_title'] }}</li>--}}

                @else
                    <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                @endif
            </ol>
        </nav>
    </div>
</div>
<!--breadcrumb end-->