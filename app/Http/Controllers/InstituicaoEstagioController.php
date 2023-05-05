<?php

namespace App\Http\Controllers;

use App\Models\Instituição_Estágio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstituicaoEstagioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $instituicao_estagio = Instituição_Estágio::all();
        return view('estágios.create', compact('instituicao_estagio'));
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
    public function show(Instituição_Estágio $instituicao_Estagio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instituição_Estágio $instituicao_Estagio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instituição_Estágio $instituicao_Estagio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instituição_Estágio $instituicao_Estagio)
    {
        //
    }
}
