<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dancer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'dance_outfit', 'type', 'country', 'rarity', 'subjection', 'introduction', 'character', 'grow_fire', 'grow_penetrate', 'grow_durable', 'grow_armor', 'barbette', 'refit', 'outside', 'inwall', 'inwarehouse', 'carriage', 'special'
    ];
}
