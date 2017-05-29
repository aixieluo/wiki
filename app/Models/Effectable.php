<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Effectable extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'effect_id',
        'effectable_id',
        'effectable_type',
    ];
}
