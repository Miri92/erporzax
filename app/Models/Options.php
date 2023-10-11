<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class options extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'site_title',
        'logo',
        'logo_white',
        'logo_social_share',
        'favicon',
        'email',
        'address',
        'phone',
        'map_embed',
        'meta_keywords',
        'meta_description',
        'phone_whatsap'
    ];
}
