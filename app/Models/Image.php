<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imageable_id', 'imageable_type', 'type', 'path'
    ];

    /**
     * 找到某图片对应的模型
     *
     */
    public function imageable (){
        $this->morphTo();
    }
}
