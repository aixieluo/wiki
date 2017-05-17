<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DancerTechnology extends Model
{
    use SoftDeletes;

    protected $dates = ['delete_at'];

    protected $fillable = ['dancer_id', 'technology_id'];

    protected $table = 'dancer_technology';
}
