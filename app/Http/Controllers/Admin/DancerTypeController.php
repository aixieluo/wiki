<?php

namespace App\Http\Controllers\Admin;

use App\Models\DancerType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DancerTypeController extends Controller
{

    private $dancerType;

    public function __construct() {
        $this->middleware('auth.admin:admin');
        $this->dancerType = new DancerType();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dancerType.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dancerType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->dancerType->type = $request->type;
        $this->dancerType->save();
        return redirect('/admin/type');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dancerType =  $this->dancerType->getOwn($id);
        return view('admin.dancerType.edit', compact('dancerType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dancerType = $this->dancerType->getOwn($id);
        $dancerType->type = $request->type;
        $dancerType->save();
        return redirect('/admin/type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
