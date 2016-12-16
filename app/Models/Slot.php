<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
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
        return $this->belongsToMany('App\Models\Equipment');
    }


    public function equipmentList($slot) {
        return $this->where('name', $slot)->first()->equipment()->get();
    }
}
