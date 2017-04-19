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
        'grow_armor',
        'barbette',
        'refit',
        'outside',
        'inwall',
        'inwarehouse',
        'carriage',
        'special'
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
     *
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
     *
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
     *
     * @return mixed 舞姬基本属性
     */
    public function basicAttributes($id) {
        return $this->findOrFail($id)->attributes()->select('fire', 'penetrate', 'durable', 'armor', 'hit', 'dodge', 'concealment', 'spy')->first();
    }

    /**
     * 获取舞姬的成长属性
     *
     * @param $id 舞姬id
     *
     * @return mixed 舞姬成长属性
     */
    public function growAttributes($id) {
        return $this->select('grow_fire', 'grow_penetrate', 'grow_durable', 'grow_armor')->findOrFail($id);
    }

    /**
     *获取舞姬各装备槽个数
     *
     * @param $id 舞姬id
     *
     * @return mixed 舞姬各装备槽个数
     */
    public function equipmentSlots($id) {
        return $this->select('barbette', 'refit', 'outside', 'inwall', 'inwarehouse', 'carriage', 'special')->findOrFail($id);
    }


    /**
     * 获取舞姬各科技各级别的大件个数
     *
     * @param $id 舞姬id
     *
     * @return mixed 舞姬各科技各级别的大件个数
     */
    public function technologyPartNumber($id) {
        return $this->findOrFail($id)->technologies()->orderBy('category', 'type')->get();
    }

    /**
     * 获取与舞姬相关联的科技种类
     *
     * @param $id 舞姬id
     *
     * @return mixed 与舞姬相关联的科技种类
     */
    public function technologyParts($id) {
        return $this->findOrFail($id)->technologies()->distinct()->orderBy('type')->pluck('type');
    }

    public function technologySlots($id, $category) {
        return $this->findOrFail($id)->technologies()->where('category', $category)->with('attributes')->get();
    }
}
