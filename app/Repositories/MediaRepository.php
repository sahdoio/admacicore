<?php

namespace App\Repositories;

use App\Libs\AppUtils;
use App\Models\AlbumMedia;
use App\Models\Media;
use App\Models\MediaCategory;
use App\Models\MediaType;
use Illuminate\Support\Facades\File;

class MediaRepository
{
    /**
     * @param $image_file
     * @param Media|null $replace_media
     * @param null $name
     * @param null $path
     * @return Media|bool|\Illuminate\Database\Eloquent\Model
     */
    public static function createImage(
        $image_file,
        Media $replace_media = null,
        $name = null,
        $path = null
    )
    {
        $original_name = $image_file->getClientOriginalName();
        $extension = $image_file->getClientOriginalExtension();
        $image_name = time() . '_image.' . $extension;

        $path = $image_file->storeAs('media', $image_name);
        if ($path)
            $path = 'storage/' . $path;
        else
            return false;

        if ($replace_media) {
            $old_path = public_path() . $replace_media->url;
            if (file_exists($old_path))
                File::delete($old_path);

            $replace_media->url = $path;
            $replace_media->save();

            $image = $replace_media;
        } else {
            $image = Media::create([
                'title' => '',
                'subtitle' => '',
                'url' => $path,
                'category_id' => MediaCategory::SITE_INFO,
                'type_id' => MediaType::PNG
            ]);
        }

        if (!$image) return false;

        return $image;
    }

    /**
     * @param $media_id
     * @return bool
     * @throws \Exception
     */
    public static function deleteImage($media_id)
    {
        $media = Media::find($media_id);

        if (!$media_id) return false;

        $file_path = public_path() . '/' . $media->url;
        if (file_exists($file_path))
            File::delete($file_path);

        $album_medias = AlbumMedia::where('media_id', $media_id)->get();
        if (count($album_medias)) {
            foreach ($album_medias as $album_media) {
                $album_media->delete();
            }
        }

        $media->delete();

        return true;
    }

    /**
     * @param $image_file
     * @param Media|null $replace_media
     * @param null $name
     * @param null $path
     * @return Media|bool|\Illuminate\Database\Eloquent\Model
     */
    public static function createVideo(
        $video_url,
        Media $replace_media = null,
        $name = null,
        $path = null
    )
    {
        $media_type = AppUtils::getVideoType($video_url);

        if ($replace_media) {
            $replace_media->url = $video_url;
            $replace_media->save();

            $video = $replace_media;
        } else {
            $video = Media::create([
                'title' => '',
                'subtitle' => '',
                'url' => $video_url,
                'category_id' => MediaCategory::SITE_INFO,
                'type_id' => $media_type
            ]);
        }

        if (!$video) return false;

        return $video;
    }

    /**
     * @param $media_id
     * @return bool
     * @throws \Exception
     */
    public static function deleteVideo($media_id)
    {
        $media = Media::find($media_id);

        if (!$media_id) return false;

        $album_medias = AlbumMedia::where('media_id', $media_id)->get();
        if (count($album_medias)) {
            foreach ($album_medias as $album_media) {
                $album_media->delete();
            }
        }

        $media->delete();

        return true;
    }
}