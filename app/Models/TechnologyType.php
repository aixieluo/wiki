<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TechnologyType extends Model
{
    use SoftDeletes;

    protected $dates = ['delete_at'];

    protected $fillable = [
        'technology_category_id',
        'name',
        'amount1',
        'amount2',
        'amount3'
    ];

    public function technologyCategory() {
        return $this->belongsTo('App\Models\TechnologyCategory');
    }

    public function technologies() {
        return $this->hasMany('App\Models\Technology');
    }
}
