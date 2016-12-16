<?php

namespace App\Http\Controllers\Api;

use App\Models\Equipment;
use App\Models\Slot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EquipmentController extends Controller
{
    /**
     * @var Equipment 模型Equipment的对象
     */
    private $equipment;

    /**
     * @var Slot 模型Slot的对象
     */
    private $slot;

    /**
     * EquipmentController constructor.
     */
    public function __construct() {
        $this->equipment = new Equipment();
        $this->slot = new Slot();
    }


    public function equipmentList(Request $request) {
        return $this->slot->equipmentList($request->slot);
    }
}
