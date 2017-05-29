<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rarity extends Model
{
    use SoftDeletes;

    protected $dates = ['delete_at'];

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
