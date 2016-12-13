<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipmentSlot extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['equipment_id', 'slot_id'];

    protected $table = 'equipment_slot';

    public $timestamps = false;
}
