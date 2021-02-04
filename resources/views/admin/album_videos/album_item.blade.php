<div class="album-grid-item" data-id="{{ $media->id }}">
    <div class="album-grid-item-box">
        <div class="video-box grid-img">
            @include('tools.iframe_video', ['media' => $media])
        </div>
        <div class="hover-wrapper">
            <div class="album-info-box">
                <div class="album-item-name">
                </div>
                <div class="album-item-button" onclick="deleteMediaItem(this)">
                    <s  pan>
                        x
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>