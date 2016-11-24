<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Effect extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'describe'
    ];

    /**
     * 特性
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function effects(){
        return $this->belongsToMany('App\Models\Effect');
    }
}
