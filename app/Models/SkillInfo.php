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
        'name'
    ];

    public function skills() {
        return $this->hasMany('App\Models\Skill');
    }
}
