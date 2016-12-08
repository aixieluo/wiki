<?php

namespace App\Http\Controllers\Api;

use App\Models\Dancer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DancerController extends Controller
{
    public function attributes (Request $request){
        return Dancer::find($request->id);
    }
}
