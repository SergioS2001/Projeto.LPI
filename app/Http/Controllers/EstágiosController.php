<?php

namespace App\Http\Controllers;

use App\Models\Estágios;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstágiosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estágios = Estágios::paginate();
        return view('estágios.index', compact('estágios'));
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
    public function show(EstágiosController $estágiosController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EstágiosController $estágiosController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EstágiosController $estágiosController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EstágiosController $estágiosController)
    {
        //
    }
}
