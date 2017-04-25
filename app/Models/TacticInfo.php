<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TacticInfo extends Model
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

    public function tactics() {
        $this->hasMany('App\Models\Tactic');
    }
}
