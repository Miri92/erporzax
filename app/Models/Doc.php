<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'status',
        'doc',
        'title',
        'body',
    ];

    public function paragraphs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(DocParagraph::class,
            'doc_id','id');
    }
}
