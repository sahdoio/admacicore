<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteInfo extends Model
{
    protected $table = 'site_info';

    protected $fillable = [
        'code',
        'title',
        'description',
        'media_id',
        'contact_id',
        'address_id'
    ];

    public function media() {
        return $this->belongsTo(Media::class);
    }

    public function contact() {
        return $this->belongsTo(Contact::class);
    }

    public function address() {
        return $this->belongsTo(Address::class);
    }
}
