<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AzeriExpress\AzeriExpressPackage;

class Menu extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'sort',
        'type',
    ];

    public function children(){
        return $this->hasMany(Menu::class,
            'parent_id','id');
    }
}
