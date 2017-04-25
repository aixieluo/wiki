<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SkillInfo extends Model
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
        'describe'
    ];

    public function skills() {
        $this->hasMany('App\Models\Skill');
    }
}
