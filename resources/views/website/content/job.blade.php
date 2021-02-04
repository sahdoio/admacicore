@extends('layout.website') 

@section('content')
    <section id="job-content">
        <div class="container">
            <div class="job-info">
                <div class="job service-box wow fadeInRight">
                    <div class="job-body">
                        <h4 class="job-heading">Details</h4>
                        <p class="job-details">
                            {!! $job->description !!}
                        </p>
                    </div>
                </div>

                <div class="job service-box wow fadeInRight">
                    <div class="job-body">
                        <h4 class="job-heading">Credits:</h4>
                        <p>

                        </p>
                    </div>
                </div>
            </div>

            <div class="job-view">
                @foreach($job->medias as $media)
                    @if($media->type_id == \App\Models\MediaType::VIMEO)
                        <div class="job-item job-video">
                            <div class="video-box embed-responsive embed-responsive-16by9">
                                <iframe src="{{ $media->url }}" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
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

            <div class="job-switcher">
                <div class="job-switcher-content">
                    <a class="job-switcher-prev"></a>
                    <a class="job-switcher-next"></a>
                </div>
            </div>
        </div>
        </div>
    </section>

    @include('website.content.jobs_list')
@endsection