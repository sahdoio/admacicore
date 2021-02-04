@extends('layout.website')

@section('content')
    <section id="blog-post">
        <!--container start-->
        <div class="container">
            <div class="row">
                <!-- Lado esquerdo -->
                <div class="col-lg-9 ">
                    <!-- blog item -->
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
                                    <img src="{{ url($post->media->url) }}" alt=""/>
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
                                <h1 class="blog-title">
                                    {{ $post->title }}
                                </h1>

                                <div class="blog-body">
                                    {!! $post->body !!}
                                </div>

                                <!-- facebook-comments -->
                                <div class="fb-comments" style="margin-top: 40px; width: 100%; display: block"
                                     data-href="{{ route('blog.post', $post->id) }}"
                                     data-numposts="5"
                                     data-width="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    @include('website.content.blog_categories');
                </div>
            </div>
        </div>
    </section>
@endsection