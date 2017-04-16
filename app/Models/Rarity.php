<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rarity extends Model
{
    protected $fillable = ['level', 'content'];

    /**
     * 获取对应稀有度的舞姬列表
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dancers() {
        return $this->hasMany('App\Models\Dancer');
    }
}
