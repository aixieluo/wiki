<?php

namespace App\Http\Controllers\Api\Home;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
    protected $skill;

    public function __construct() {
        $this->skill = new Skill();
    }

    public function skillNames() {
        return $this->skill->skillNames();
    }

    public function skillAttributes(Request $request) {
        return $this->skill->skillAttributes($request->name, $request->lv);
    }
}
