<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;

    protected $dates = ['delete_at'];

    protected $fillable = ['content'];

    /**
     * 获取对应车型的舞姬列表
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dancers() {
        return $this->hasMany('App\Models\Dancer');
    }
}
