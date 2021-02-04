@if($media)
    @php
        $video_code = App\Libs\AppUtils::getVideoCode($media->url);
        $width = (isset($width) ? $width : '640');
        $height = (isset($height) ? $height : '360');
    @endphp

    @if($media->type_id == \App\Models\MediaType::VIMEO)
        @include('tools.iframe_vimeo', [
            'video_code' => $video_code,
            'width' => $width,
            'height' => $height
        ])
    @endif

    @if($media->type_id == \App\Models\MediaType::YOUTUBE)
        @include('tools.iframe_youtube', [
            'video_code' => $video_code,
            'width' => $width,
            'height' => $height
        ])
    @endif
@else
    <p>Nenhuma mídia encntrada</p>
@endif