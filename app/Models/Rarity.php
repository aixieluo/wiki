<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rarity extends Model
{
    protected $fillable= [
        'rarity'
    ];

    /**
     * 获取舞姬的稀有度
     *
     * @param $id 舞姬id
     * @return mixed 舞姬稀有度
     */
    public function rarity($id) {
        return $this->select('rarity')->findOrFail($id);
    }
}
