<?php

namespace App\Http\Controllers\Api;

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
}
