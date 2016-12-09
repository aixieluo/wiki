<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DancerTechnology extends Model
{
    protected $fillable = ['dancer_id', 'technology_id'];

    protected $table = 'dancer_technology';
}
