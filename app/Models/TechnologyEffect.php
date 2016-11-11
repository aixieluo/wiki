<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TechnologyEffect extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'technology_id', 'effect_id'
    ];
}
