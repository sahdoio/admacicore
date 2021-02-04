@if(isset($albums) && count($albums))
    <section id="jobs-content">
        <div class="container">
            <div class="grid">
                @foreach ($albums as $album)
                    <div class="grid-item">
                        <div class="folio-item">
                            @if($album->cover_media->type_id == \App\Models\MediaType::VIMEO)
                                <div class="folio-media">
                                    <iframe src="{{ $album->cover_media->url }}" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                </div>
                            @elseif(
                                $album->cover_media->type_id == \App\Models\MediaType::JPG ||
                                $album->cover_media->type_id == \App\Models\MediaType::PNG ||
                                $album->cover_media->type_id == \App\Models\MediaType::GIF
                            )
                                <div class="folio-media">
                                    <img class="img-responsive" src="{{ url($album->cover_media->url) }}">
                                </div>
                            @else
                                <div class="folio-media">
                                    <h1>Mídia desconhecida</h1>
                                </div>
                            @endif

                            <a class="overlay" href="{{ route('album_images.album', $album->id) }}">
                                <div class="overlay-content">
                                    <div class="overlay-text">
                                        <div class="folio-info">
                                            <h3>{{ $album->title }}</h3>
                                        </div>
                                        <div class="folio-overview">
                                            <span class="folio-link">
                                                <div class="folio-read-more">
                                                    <h3>{{ $album->name }}</h3>
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
@else
    <section style="padding:300px 30px; ">
        <h1 style="margin:auto; display:block; text-align:center; font-weight: 700">Nenhum álbum encontrado...</h1>
    </section>
@endif