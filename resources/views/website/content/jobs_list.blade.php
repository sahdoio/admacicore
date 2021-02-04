<section id="jobs-content">
    <div class="container">
        <div class="grid">
            @foreach ($jobs as $job)
                <div class="grid-item">
                    <div class="folio-item">
                        @if($job->cover_media->type_id == \App\Models\MediaType::VIMEO)
                            <div class="folio-media">
                                <iframe src="{{ $job->cover_media->url }}" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                            </div>
                        @elseif(
                            $job->cover_media->type_id == \App\Models\MediaType::JPG ||
                            $job->cover_media->type_id == \App\Models\MediaType::PNG ||
                            $job->cover_media->type_id == \App\Models\MediaType::GIF
                        )
                            <div class="folio-media">
                                <img class="img-responsive" src="{{ url($job->cover_media->url) }}">
                            </div>
                        @else
                            <div class="folio-media">
                                <h1>Mídia desconhecida</h1>
                            </div>
                        @endif

                        <a class="overlay" href="{{ route('jobs.job', $job->id) }}">
                            <div class="overlay-content">
                                <div class="overlay-text">
                                    <div class="folio-info">
                                        <h3>{{ $job->title }}</h3>
                                    </div>
                                    <div class="folio-overview">
                                        <span class="folio-link">
                                            <div class="folio-read-more">
                                                <h3>— view —</h3>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>