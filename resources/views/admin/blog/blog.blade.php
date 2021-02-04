@extends('layout.admin')

@section('styles')
    <link rel="stylesheet" href="/admin/cdn/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"/>
    <link rel="stylesheet" href="/admin/css/dropify.css"/>
    <link rel="stylesheet" href="/admin/css/pages/blog/blog.css"/>
@endsection

@section('content')
    <div class="panel-header panel-header-sm">
    </div>

    <section id="blog-content" class="content">
        <div class="blog">
            <div class="form-group">
                <div class="row section">
                    <h2 class="section-title col s12 m6">Publicações</h2>
                    <div class="blog-btn-box col s12 m6">
                        <button id="buttonAdd" type="button" class="btn btn-success add" data-href="{{ route('admin.blog.new') }}">
                            Nova publicação
                        </button>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    @foreach($posts as $i => $post)
                        @php
                            $front_id = $i + 1;
                        @endphp
                        @if($post->media)
                            @if($post->media->type_id == \App\Models\MediaType::VIMEO)
                                <div class="item-job col-sm-4 grid" data-id="{{ $post->id }}" data-front-id="{{ $front_id }}">
                                    <figure class="effect-roxy">
                                        <iframe src="{{ $post->media->url }}" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                        <figcaption>
                                            <div class="button-wrapper">
                                                <button id="btnEdit" type="button" class="btn btn-primary edit" data-edit="{{ route('admin.blog.edit', $post->id) }}">Edit</button>
                                                <button id="btnDelete" type="button" class="btn btn-primary delete" data-delete="{{ route('admin.blog.delete', $post->id) }}">Delete</button>
                                            </div>
                                            <h2>{{ $post->title }}</h2>
                                            <a href="{{ route('admin.blog.edit', $post->id) }}">View more</a>
                                        </figcaption>
                                    </figure>
                                </div>
                            @elseif($post->media->isImage() || $post->media->isVideo() || $post->media->isGeneric())
                                <div class="item-job col-sm-4 grid" data-id="{{ $post->id }}" data-front-id="{{ $front_id }}">
                                    <figure class="effect-roxy">
                                        <img src="{{ isset($post->media->url) ? url($post->media->url) : '' }}" alt="{{"Job $front_id"}}"/>
                                        <figcaption>
                                            <div class="button-wrapper">
                                                <button id="btnEdit" type="button" class="btn btn-primary edit" data-edit="{{ route('admin.blog.edit', $post->id) }}">Edit</button>
                                                <button id="btnDelete" type="button" class="btn btn-primary delete" data-delete="{{ route('admin.blog.delete', $post->id) }}">Delete</button>
                                            </div>
                                            <h2>{{ $post->title }}</h2>
                                            <a href="{{ route('admin.blog.edit', $post->id) }}">View more</a>
                                        </figcaption>
                                    </figure>
                                </div>
                            @else
                                <div class="item-job col-sm-4 grid" data-id="{{ $post->id }}" data-front-id="{{ $front_id }}">
                                    <figure class="effect-roxy">
                                        <img src="{{ asset('media/assets/noimage.jpg') }}" alt="{{"Job $front_id"}}"/>
                                        <figcaption>
                                            <div class="button-wrapper">
                                                <button id="btnEdit" type="button" class="btn btn-primary edit" data-edit="{{ route('admin.blog.edit', $post->id) }}">Edit</button>
                                                <button id="btnDelete" type="button" class="btn btn-primary delete" data-delete="{{ route('admin.blog.delete', $post->id) }}">Delete</button>
                                            </div>
                                            <h2>{{ $post->title }}</h2>
                                            <a href="{{ route('admin.blog.edit', $post->id) }}">View more</a>
                                        </figcaption>
                                    </figure>
                                </div>
                            @endif
                        @else
                            <div class="item-job col-sm-4 grid" data-id="{{ $post->id }}" data-front-id="{{ $front_id }}">
                                <figure class="effect-roxy">
                                    <img src="{{ asset('media/assets/noimage.jpg') }}" alt="{{"Job $front_id"}}"/>
                                    <figcaption>
                                        <div class="button-wrapper">
                                            <button id="btnEdit" type="button" class="btn btn-primary edit" data-edit="{{ route('admin.blog.edit', $post->id) }}">Edit</button>
                                            <button id="btnDelete" type="button" class="btn btn-primary delete" data-delete="{{ route('admin.blog.delete', $post->id) }}">Delete</button>
                                        </div>
                                        <h2>{{ $post->title }}</h2>
                                        <a href="{{ route('admin.blog.edit', $post->id) }}">View more</a>
                                    </figcaption>
                                </figure>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="/admin/cdn/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="/admin/js/pages/blog/blog.js"></script>
@endsection