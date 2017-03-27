<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TechnologyType extends Model
{
    protected $fillable= [
        'technology_category_id', 'type'
    ];
}
