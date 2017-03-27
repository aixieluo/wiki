<?php

namespace App\Http\Controllers\Api;

use App\Models\Dancer;
use App\Models\Rarity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DancerController extends Controller
{
    /**
     * @var Dancer 模型Dancer的对象
     */
    private $dancer;

    /**
     * @var Rarity 模型Rarity的对象
     */
    private $rarity;

    /**
     * DancerController constructor.
     */
    public function __construct() {
        $this->dancer = new Dancer();
        $this->rarity = new Rarity();
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
        return $this->rarity->rarity($request->id);
    }

    /**
     * 获取舞姬各科技各级别的大件个数
     *
     * @param Request $request
     * @return mixed
     */
    public function technologyPartNumber(Request $request) {
        $parts = $this->dancer->technologyPartNumber($request->id);
        $partNumber = array();
        foreach ( $parts as $part ) {
            $partNumber[$part['type']]['rank'.$part['rank']] = 0;
        }
        foreach ( $parts as $part ) {
            $partNumber[$part['type']]['rank'.$part['rank']]++;
        }
        return $partNumber;
    }

    /**
     * 获取与舞姬相关联的科技种类
     *
     * @param Request $request
     * @return mixed
     */
    public function technologyParts(Request $request) {
        return $this->dancer->technologyParts($request->id);
    }

    /**
     * 获取某舞姬的某科技所有大件
     *
     * @param Request $request
     * @return mixed
     */
    public function technologySlots(Request $request) {
        return $this->dancer->technologySlots($request->id, $request->category);
    }
}
