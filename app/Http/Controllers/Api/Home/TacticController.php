<?php

namespace App\Http\Controllers\Api\Home;

use App\Models\Tactic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TacticController extends Controller
{
    protected $tactic;

    public function __construct() {
        $this->tactic = new Tactic();
    }

    public function tacticNames() {
        return $this->tactic->tacticNames();
    }

    public function tacticAttributes(Request $request) {
        return $this->tactic->tacticAttributes($request->name, $request->lv);
    }
}
