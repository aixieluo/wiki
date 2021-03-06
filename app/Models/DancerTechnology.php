<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DancerTechnology extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['dancer_id', 'technology_id'];

    protected $table = 'dancer_technology';
}
