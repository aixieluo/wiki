<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dancer extends Model
{
    use SoftDeletes;

    protected $dates = ['delete_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'dance_outfit',
        'type_id',
        'country_id',
        'rarity_id',
        'subjection',
        'introduction',
        'character',
        'grow_fire',
        'grow_penetrate',
        'grow_durable',
        'grow_armor'
    ];

    /**
     * 获取舞姬车型
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type() {
        return $this->belongsTo('App\Models\Type');
    }

    /**
     * 获取舞姬国籍
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country() {
        return $this->belongsTo('App\Models\Country');
    }

    /**
     * 获取舞姬稀有度
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rarity() {
        return $this->belongsTo('App\Models\Rarity');
    }

    /**
     * 获取基础属性
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function attributes() {
        return $this->morphMany('App\Models\Attribute', 'attributeable');
    }

    /**
     * 获取科技
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function technologies() {
        return $this->belongsToMany('App\Models\Technology');
    }

    /**
     * 获取匹配的装备槽及个数
     *
     * @return $this
     */
    public function slots() {
        return $this->belongsToMany('App\Models\Slot')->withPivot('count');
    }

    /**
     * 获取图片
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function images() {
        return $this->morphMany('App\Models\Image', 'imageable');
    }
}
