<?php

namespace App\Http\Controllers\Home;

use App\Models\Dancer;
use App\Repositories\DancerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DancerController extends Controller
{
    protected $dancerRepository;

    public function __construct(DancerRepository $dancerRepository) {
        $this->dancerRepository = $dancerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $dancers = Dancer::with('images')->get();
        foreach ($dancers as $dancer) {
            $dancer->images = $dancer->images->pluck('path', 'type');
        }

        return view('home.dancer.index', compact('dancers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $dancer = $this->dancerRepository->getByDetailInfo($id);

        return view('home.dancer.show', compact('dancer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
