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
     * 获取基础属性
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function attributes() {
        return $this->morphMany('App\Models\Attribute','attributeable');
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
     * 获取图片
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function images() {
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    /**
     * 获取舞姬的信息
     *
     * @param $id 舞姬id
     * @return \Illuminate\Database\Eloquent\Collection|Model 舞姬信息
     */
    public function own($id) {
        $own = $this->findOrFail($id);
        return $own;
    }

    /**
     * 获取舞姬相关图片
     *
     * @param $id 舞姬id
     * @return mixed 舞姬相关的图片
     */
    public function photos($id) {
        $photos = $this->findOrFail($id)->images()->get()->pluck('path', 'type');
        return $photos;
    }

    /**
     * 获取舞姬的基本属性
     *
     * @param $id 舞姬id
     * @return mixed 舞姬基本属性
     */
    public function basicAttributes($id) {
        return $this->findOrFail($id)
            ->attributes()
            ->select('fire', 'penetrate', 'durable', 'armor', 'hit', 'dodge', 'concealment', 'spy')
            ->first();
    }

    /**
     * 获取舞姬的成长属性
     *
     * @param $id 舞姬id
     * @return mixed 舞姬成长属性
     */
    public function growAttributes($id) {
        return $this->select('grow_fire', 'grow_penetrate', 'grow_durable', 'grow_armor')->findOrFail($id);
    }

    /**
     *获取舞姬各装备槽个数
     *
     * @param $id 舞姬id
     * @return mixed 舞姬各装备槽个数
     */
    public function equipmentSlots($id) {
        return $this->select('barbette', 'refit', 'outside', 'inwall', 'inwarehouse', 'carriage', 'special')->findOrFail($id);
    }

    /**
     * 获取舞姬的稀有度
     *
     * @param $id 舞姬id
     * @return mixed 舞姬稀有度
     */
    public function rarity($id) {
        return $this->select('rarity')->findOrFail($id);
    }
}
