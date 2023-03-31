<?php

namespace App\Http\Controllers;

use App\Models\Histórico;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistóricoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $histórico = Histórico::paginate();
        return view('histórico.index', compact('histórico'));
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
    public function show(Histórico $historico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Histórico $historico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Histórico $historico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Histórico $historico)
    {
        //
    }
    
}
