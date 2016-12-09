<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'category', 'type', 'rank'
    ];

    /**
     * 舞姬
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function dancers(){
        return $this->belongsToMany('App\Models\Dancer');
    }

    /**
     * 获取所有属性
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function attributes(){
        return $this->morphMany('App\Models\Attribute','attributeable');
    }

    /**
     * 获取特性
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function effects(){
        return $this->morphToMany('App\Models\Effect', 'effectable');
    }
}
