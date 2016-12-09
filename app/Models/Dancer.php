<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dancer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'dance_outfit', 'type', 'country', 'rarity', 'subjection', 'introduction', 'character', 'grow_fire', 'grow_penetrate', 'grow_durable', 'grow_armor', 'barbette', 'refit', 'outside', 'inwall', 'inwarehouse', 'carriage', 'special'
    ];

    /**
     * 获取所有属性
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function attributes(){
        return $this->morphMany('App\Models\Attribute','attributeable');
    }

    /**
     * 科技
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function technologies(){
        return $this->belongsToMany('App\Models\Technology');
    }

    public function images(){
        return $this->morphMany('App\Models\Image', 'imageable');
    }
}
