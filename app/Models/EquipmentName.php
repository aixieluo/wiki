<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EquipmentName extends Model
{
    use SoftDeletes;

    protected $dates = ['delete_at'];
    protected $fillable = ['name'];
}
