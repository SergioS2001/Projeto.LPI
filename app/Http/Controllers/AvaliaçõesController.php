<?php

namespace App\Http\Controllers;

use App\Models\Avaliações;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AvaliaçõesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avaliações = Avaliações::all();
        return view('avaliações.index', compact('avaliações'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Avaliações $Avaliações)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Avaliações $Avaliações)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Avaliações $Avaliações)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Avaliações $Avaliações)
    {
        //
    }
}
