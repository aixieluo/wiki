<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slot extends Model
{
    use SoftDeletes;

    protected $dates = ['delete_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * 获取该武器槽对应的所有武器
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function equipment() {
        return $this->hasMany('App\Models\Equipment');
    }
}
