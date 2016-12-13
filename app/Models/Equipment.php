<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'lv', 'describe', 'price'];

    /**
     * 获取装备槽位
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function slots(){
        return $this->belongsToMany('App\Models\Slot');
    }
}
