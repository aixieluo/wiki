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
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $dancer = $this->dancerRepository->getById($id);

        return view('home.dancer.show', compact('dancer'));
    }
}
