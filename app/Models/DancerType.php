<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class DancerType extends Model
{

    use SoftDeletes;

    protected $dates = ['delete_at'];

    protected $fillable= [
        'type'
    ];

    public function getOwn($id) {
        return $this->findOrFail($id);
    }

    public function getList() {
        return $this->select('id', 'type')->orderBy('id', 'desc')->get();
    }

}
