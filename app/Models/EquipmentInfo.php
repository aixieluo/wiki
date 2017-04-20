<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EquipmentInfo extends Model
{
    use SoftDeletes;

    protected $dates = ['delete_at'];
    protected $fillable = ['name', 'describe'];

    public function equipment() {
        return $this->hasMany('App\Models\Equipment');
    }
}
