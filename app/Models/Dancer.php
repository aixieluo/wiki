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
    public function attributes(){
        return $this->morphMany('App\Models\Attribute','attributeable');
    }

    /**
     * 获取科技
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function technologies(){
        return $this->belongsToMany('App\Models\Technology');
    }

    /**
     * 获取图片
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function images(){
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    /**
     * 获取舞姬的信息
     *
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|Model
     */
    public function own($id){
        $own = $this->findOrFail($id);
        return $own;
    }

    /**
     * 获取舞姬相关图片
     *
     * @param $id
     * @return mixed
     */
    public function photos($id){
        $photos = $this->findOrFail($id)->images()->get()->pluck('path', 'type');
        return $photos;
    }

    /**
     * 获取舞姬的基本属性
     *
     * @param $id
     * @return mixed
     */
    public function basicAttributes($id)
    {
        return $this->findOrFail($id)->attributes()->first();
    }

    /**
     * 获取舞姬的成长属性
     *
     * @param $id
     * @return mixed
     */
    public function growAttributes($id){
        $grow = $this->select('grow_fire', 'grow_penetrate', 'grow_durable', 'grow_armor')->findOrFail($id);
        return $grow;
    }
}
