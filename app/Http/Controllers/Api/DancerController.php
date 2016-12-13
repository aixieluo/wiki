<?php

namespace App\Http\Controllers\Api;

use App\Models\Dancer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DancerController extends Controller
{
    public function attributes (Request $request){
        $attribute = new Dancer();
        return $attribute->basicAttributes($request->id);
    }
}
