<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocParagraph extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'doc_id',
        'title',
        'title_label',
        'body',
    ];
}
