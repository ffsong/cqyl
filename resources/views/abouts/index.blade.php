
@extends('layouts.app')

@section('title','关于我们-'.$common_data['config']['website'])

@section('description','关于我们-'.$common_data['config']['website'])

@section('main')

    @include('layouts._breadcrumb',['title'=>'关于我们'])

    <!--content start-->
    <div>
        <div class="container py-5" >
            <div class="row about-content">
                <div class="col-lg-5 col-12 mb-3 text-center">
                    @foreach ($result as $article)
                        <img class="img-fluid" src="{{ asset('/uploads/'.$article->images) }}">
                    @endforeach

                </div>

                <div class="col-lg-7 col-12 pt-4">
                    <div class="content-font-size" style="min-height: 200px;" >
                        @foreach ($result as $article)
                            {!! $article->content !!}
                        @endforeach
                    </div>

                    <!--大屏页脚-->
                    <div class="row d-none d-lg-block pag-big">

                        <nav class="mx-auto" aria-label="Page navigation example">
                            {{ $result->links() }}
                        </nav>
                    </div>
                    <!--大屏页脚-->

                    <!--小屏页码-->
                    <div class="row d-lg-none">
                        <nav class="mx-auto" aria-label="Page navigation example">
                            {{ $result->links() }}
                        </nav>
                    </div>
                    <!--小屏页码-->
                    <!--Pagination-->
                </div>
            </div>
        </div>
    </div>
    <!--content end-->
@endsection