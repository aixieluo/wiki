<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\DancerType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DancerTypeController extends Controller
{
    protected $dancerType;

    public function __construct () {
        $this->dancerType = new DancerType();
    }

    public function getList () {
        return $this->dancerType->getList();
    }
}
