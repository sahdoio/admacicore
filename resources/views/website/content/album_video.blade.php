@extends('layout.website') 

@section('content')
<section id="job-content">
    <div class="container">
        <div class="job-info">'
            <div class="job service-box wow fadeInRight">
                <div class="job-body">
                    <h4 class="job-heading">Details</h4>
                    <p class="job-details">
                        {{ $album->description }}
                    </p>
                </div>
            </div>

            <div class="job service-box wow fadeInRight">
                <div class="job-body">
                    <h4 class="job-heading">Credits:</h4>
                    <p></p>
                </div>
            </div>
        </div>

        <div class="job-view">
            @foreach($album->medias as $media)
                @if(
                    $media->type_id == \App\Models\MediaType::VIMEO ||
                    $media->type_id == \App\Models\MediaType::YOUTUBE
                )
                    <div class="job-item job-video">
                        <div class="video-box embed-responsive embed-responsive-16by9">
                            @include('tools.iframe_video', ['media' => $media])
                        </div>
                    </div>
                @elseif(
                    $media->type_id == \App\Models\MediaType::GENERIC ||
                    $media->type_id == \App\Models\MediaType::JPG ||
                    $media->type_id == \App\Models\MediaType::PNG ||
                    $media->type_id == \App\Models\MediaType::GIF
                )
                    <div class="job-item job-image">
                        <div class="img-box img-responsive">
                            <img src="{{ url($media->url) }}">
                        </div>
                    </div>
                @else
                    <div class="job-item job-image">
                        <h1>Mídia desconhecida</h1>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="comments-area">
            <div class="row">
                <div class="col-sm-12">
                    <!-- facebook-comments -->
                    <div class="fb-comments" style="margin-top: 40px; width: 100%; display: block"
                         data-href="{{ route('album_images.album', $album->id) }}"
                         data-numposts="5"
                         data-width="100%">
                    </div>
                </div>
            </div>
        </div>

        <div class="job-switcher">
            <div class="job-switcher-content">
                <a class="job-switcher-prev"></a>
                <a class="job-switcher-next"></a>
            </div>
        </div>
    </div>
    </div>
</section>

@if(isset($albums) && count($albums))
    <div class="divider"></div>
    @include('website.content.album_videos_list')
@endif

@endsection