<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Role extends Model
{

    protected $fillable = [
        'name',
        'title',
        'guard_name',
        'role'
    ];
//    public function users()
//    {
//        return $this->hasMany('App\Models\User');
//    }
}
