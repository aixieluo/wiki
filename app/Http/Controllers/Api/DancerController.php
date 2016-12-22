<?php

namespace App\Http\Controllers\Api;

use App\Models\Dancer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DancerController extends Controller
{
    /**
     * @var Dancer 模型Dancer的对象
     */
    private $dancer;

    /**
     * DancerController constructor.
     */
    public function __construct() {
        $this->dancer = new Dancer();
    }

    /**
     * 获取舞姬的属性
     *
     * @param Request $request
     * @return mixed
     */
    public function attributes(Request $request) {
        return $this->dancer->basicAttributes($request->id);
    }

    /**
     * 获取舞姬的成长属性
     *
     * @param Request $request
     * @return mixed
     */
    public function growAttributes(Request $request) {
        return $this->dancer->growAttributes($request->id);
    }

    /**
     * 获取舞姬的各装备槽个数
     *
     * @param Request $request
     * @return mixed
     */
    public function equipmentSlots(Request $request) {
        return $this->dancer->equipmentSlots($request->id);
    }

    /**
     * 获取舞姬稀有度
     *
     * @param Request $request
     * @return mixed
     */
    public function rarity(Request $request) {
        return $this->dancer->rarity($request->id);
    }
}
