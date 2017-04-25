<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TechnologyCategory extends Model
{
    use SoftDeletes;

    protected $dates = ['delete_at'];

    protected $fillable = [
        'content'
    ];

    public function technologyTypes() {
        return $this->hasMany('App\Models\TechnologyType');
    }

    public function technologies() {
        return $this->hasManyThrough('App\Models\Technology', 'App\Models\TechnologyType');
    }
}
