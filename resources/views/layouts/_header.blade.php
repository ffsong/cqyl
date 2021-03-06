<div class="img-responsive top-bg ">
    <div class="container">
        <div class="row top-bg-img d-none d-md-block">
            {{--<img class="img-fluid d-none d-md-block" src="{{asset('./images/top_content.png')}}">--}}
        </div>
    </div>
</div>

<!--nav start-->
<div class="container" style="padding-left: 0px; padding-right: 0px">
    <nav class="navbar navbar-expand-md navbar-light bg-white py-0 px-0">
        <a class="navbar-brand d-md-none px-0" style="width: 68%" href="{{ route('/') }}">
            <img class="img-fluid px-0" style="width: 100%" src="{{ asset('./images/w-logo_02.png') }}" width="30" height="30" alt="">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse width-100" id="navbarNav">
            <div class="row width-100" style="margin: auto">
                <ul class="navbar-nav width-100" >

                    <div class="col-sm-7ths">
                        <li class=" nav-item nva-{{ active_class(if_route('/')) }} ">
                            <a class="nav-link text-center nav-color" href="{{ route('/') }}">首页</a>
                        </li>
                    </div>

                    <div class="col-sm-7ths">

                        <li class="nav-item dropdown nva-{{ active_class((if_route('abouts'))) }}">

                            <a class="nav-link text-center nva-color d-block d-lg-none" href="{{ route('abouts',['id'=>$categorys[0]['id']]) }}">
                                {{ $categorys[0]['title'] }}
                            </a>

                            <a class="nav-link text-center nav-color d-none d-lg-block" href="{{ route('abouts',['id'=>$categorys[0]['id']]) }}" id="navbarDropdownMenuLink"
                               data-toggle="" aria-haspopup="true" aria-expanded="false">
                                {{ $categorys[0]['title'] }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @foreach($categorys[0]['list_title'] as $article)
                                    <a class="dropdown-item" href="{{ route('abouts',['id'=>$article->id]) }}">{{ $article->title }}</a>
                                @endforeach
                            </div>
                        </li>

                    </div>

                    <div class="col-sm-7ths">
                        <li class=" nav-item dropdown nva-{{ active_class(if_route('news')) }}">
                            {{--小屏目录--}}
                            <a class="nav-link text-center nav-color d-block d-lg-none"
                               href="{{ route('news',['category_id'=>$categorys[1]['list_title'][0]['id']]) }}">
                                {{ $categorys[1]['title'] }}
                            </a>
                            {{--小屏目录--}}

                            <a class="nav-link text-center nav-color d-none d-lg-block"
                               href="{{ route('news',['category_id'=>$categorys[1]['list_title'][0]['id']]) }}" id="navbarDropdownMenuLink1"
                               data-toggle="" aria-haspopup="true" aria-expanded="false">
                                {{ $categorys[1]['title'] }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                                @foreach($categorys[1]['list_title'] as $article)
                                    <a class="dropdown-item" href="{{ route('news',['category_id'=>$article->id]) }}">{{ $article->title }}</a>
                                @endforeach
                            </div>

                        </li>
                    </div>

                    <div class="col-sm-7ths">
                        <li class=" nav-item dropdown nva-{{ active_class(if_route('business')) }}">

                            <a class="nav-link text-center nav-color d-block d-lg-none"
                               href="{{ route('business',['id'=>$categorys[2]['list_title'][0]['id']]) }}">
                                {{ $categorys[2]['title'] }}
                            </a>

                            <a class="nav-link text-center nav-color d-none d-lg-block"
                               href="{{ route('business',['id'=>$categorys[2]['list_title'][0]['id']]) }}" id="navbarDropdownMenuLink2"
                               data-toggle="" aria-haspopup="true" aria-expanded="false">
                                {{ $categorys[2]['title'] }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                                @foreach($categorys[2]['list_title'] as $article)
                                    <a class="dropdown-item" href="{{ route('business',['id'=>$article->id]) }}">
                                        {{ str_limit($article->title,'16','等') }}
                                    </a>
                                @endforeach
                            </div>

                        </li>
                    </div>

                    <div class="col-sm-7ths">
                        <li class=" nav-item dropdown nva-{{ active_class(if_route('culture')) }}">
                            {{--小屏目录--}}
                            <a class="nav-link text-center nav-color d-block d-lg-none"
                               href="{{ route('culture',
                                   ['category_id'=>$categorys[5]['list_article']['cateaory_id'],'article_id'=>$categorys[5]['list_article']['id']]) }}">
                                {{ $categorys[5]['title'] }}
                            </a>
                            {{--小屏目录--}}

                            <a class="nav-link text-center nav-color d-none d-lg-block"
                               href="{{ route('culture',
                                   ['category_id'=>$categorys[5]['list_article']['cateaory_id'],'article_id'=>$categorys[5]['list_article']['id']]) }}"
                               id="navbarDropdownMenuLink1"
                               data-toggle="" aria-haspopup="true" aria-expanded="false">
                                {{ $categorys[5]['title'] }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                                <a class="dropdown-item"
                                   href="{{ route('culture',
                                   ['category_id'=>$categorys[5]['list_article']['cateaory_id'],'article_id'=>$categorys[5]['list_article']['id']]) }}">
                                    {{ $categorys[5]['list_article']['title'] }}
                                </a>

                                @foreach($categorys[5]['list_title'] as $article)
                                    <a class="dropdown-item" href="{{ route('culture',['category_id'=>$article->id]) }}">
                                        {{ $article->title }}
                                    </a>
                                @endforeach
                            </div>

                        </li>
                    </div>


                    <div class="col-sm-7ths">
                        <li class=" nav-item dropdown nva-{{ active_class(if_route('industry')) }}">

                            {{--小屏目录--}}
                                <a class="nav-link text-center nav-color d-block d-lg-none"
                                   href="{{ route('industry',['category_id'=>$categorys[3]['list_title'][0]['id']]) }}">
                                    {{ $categorys[3]['title'] }}
                                </a>
                            {{--小屏目录--}}

                            <a class="nav-link text-center nav-color d-none d-lg-block"
                               href="{{ route('industry',['category_id'=>$categorys[3]['list_title'][0]['id']]) }}" id="navbarDropdownMenuLink1"
                               data-toggle="" aria-haspopup="true" aria-expanded="false">
                                {{ $categorys[3]['title'] }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                                @foreach($categorys[3]['list_title'] as $article)
                                    <a class="dropdown-item" href="{{ route('industry',['category_id'=>$article->id]) }}">{{ $article->title }}</a>
                                @endforeach
                            </div>

                        </li>
                    </div>


                    <div class="col-sm-7ths">
                        <li class=" nav-item nva-{{ active_class(if_route('contacts')) }}">
                            <a class="nav-link text-center nav-color" href="{{ route('contacts') }}">
                                {{ $categorys[4]['title'] }}
                            </a>
                        </li>
                    </div>

                </ul>
            </div>
        </div>
    </nav>
</div>
<!--nav end-->
