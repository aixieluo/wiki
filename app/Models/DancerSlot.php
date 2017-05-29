<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DancerSlot extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['dancer_id', 'slot_id'];

    protected $table = 'dancer_slot';
}
