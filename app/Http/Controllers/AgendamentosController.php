<?php

namespace App\Http\Controllers;

use App\Models\Agendamentos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgendamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendamentos = Agendamentos::all();
        return view('agendamentos.index', compact('agendamentos'));
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
    public function show(Agendamentos $Agendamentos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agendamentos $Agendamentos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agendamentos $Agendamentos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agendamentos $Agendamentos)
    {
        //
    }
}
