<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model 
{
    protected $table = 'medias';
    
    protected $fillable = [
        'title', 
        'subtitle', 
        'url',
        'html',
        'category_id',
        'type_id'
    ];

    public function category()
    {
        return $this->belongsTo(MediaCategory::class, 'category_id');
    }

    public function type()
    {
        return $this->belongsTo(MediaType::class, 'type_id');
    }

    public static function banners()
    {
        $banners = self::join('media_categories', 'medias.category_id', '=', 'media_categories.id')
            ->select('medias.*', 'media_categories.name as media_name')
            ->where('media_categories.name', 'banner')
            ->get();

        return $banners;
    }

    public function isImage()
    {
        switch ($this->type_id) {
            case MediaType::JPG:
                return true;
                break;
            case MediaType::PNG:
                return true;
                break;
            case MediaType::GIF:
                return true;
                break;
        }

        return false;
    }

    public function isVideo()
    {
        switch ($this->type_id) {
            case MediaType::MP4:
                return true;
                break;
        }

        return false;
    }

    public function isDoc()
    {
        switch ($this->type_id) {
            case MediaType::PDF:
                return true;
                break;
            case MediaType::DOC:
                return true;
                break;
        }

        return false;
    }

    public function isLink()
    {
        switch ($this->type_id) {
            case MediaType::VIMEO:
                return true;
                break;
            case MediaType::YOUTUBE:
                return true;
                break;
        }

        return false;
    }

    public function isGeneric()
    {
        if ($this->type_id != MediaType::GENERIC)
            return false;

        return true;
    }
}
