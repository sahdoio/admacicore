<div class="album-grid-item" data-id="{{ $media->id }}">
    <div class="album-grid-item-box">
        <img class="grid-img" src="{{ url($media->url) }}">
        <div class="hover-wrapper">
            <div class="album-info-box">
                <div class="album-item-name">
                </div>
                <div class="album-item-button" onclick="deleteMediaItem(this)">
                    <span>
                        x
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>