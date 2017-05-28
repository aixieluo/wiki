<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipmentInfoSlot extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['equipment_info_id', 'slot_id', 'main'];
}
