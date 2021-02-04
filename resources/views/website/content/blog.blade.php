@extends('layout.website')

@section('content')
    <section id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    @if(count($posts))
                        @foreach($posts as $post)
                            <div class="blog-item">
                                <div class="row">
                                    <div class="col-lg-2 col-sm-2">
                                        <div class="date-wrap">
                                            <span class="date">
                                                {{ $post->getDay() }}
                                            </span>
                                            <span class="month">
                                                {{ $post->getMonth(false, true) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-sm-10">
                                        <div class="blog-img">
                                            <img src="{{ $post->media->url }}" alt=""/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-sm-2 text-right">
                                        <div class="author">
                                            By
                                            <a href="#">
                                                {{ $post->user->name }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-sm-10">
                                        <h1>
                                            <a class="blog-title" href="#">
                                                {{ $post->title }}
                                            </a>
                                        </h1>

                                        <div class="blog-body">
                                            {!! \Illuminate\Support\Str::limit(strip_tags($post->body), 400) !!}
                                        </div>
'
                                        <a href="{{ route('blog.post', $post->id) }}" class="btn blog-more-btn">
                                            Veja Mais
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div style="padding:120px 30px; ">
                            <h1 style="margin:auto; display:block; text-align:center; font-weight: 700">Nenhuma publicação encontrada...</h1>
                        </div>
                    @endif
                </div>
                <div class="col-lg-3">
                    @include('website.content.blog_categories')
                </div>
            </div>
        </div>
    </section>
@endsection