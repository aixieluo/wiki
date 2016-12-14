<?php

namespace App\Http\Controllers\Api;

use App\Models\Dancer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DancerController extends Controller
{
    /**
     * 获取某辆车的属性
     *
     * @param Request $request
     * @return mixed
     */
    public function attributes (Request $request){
        $dancer = new Dancer();
        return $dancer->basicAttributes($request->id);
    }

    /**
     * 获取某辆车的成长属性
     *
     * @param Request $request
     * @return mixed
     */
    public function grow (Request $request){
        $dancer = new Dancer();
        return $dancer->growAttributes($request->id);
    }
}
