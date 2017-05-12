<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use SoftDeletes;

    protected $dates = ['delete_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'attributeable_id',
        'attributeable_type',
        'fire',
        'penetrate',
        'durable',
        'armor',
        'hit',
        'dodge',
        'concealment',
        'spy'
    ];

    /**
     * 获取所属的attributeable模型
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function attributeable() {
        return $this->morphTo();
    }


}
