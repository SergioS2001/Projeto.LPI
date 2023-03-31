<?php

namespace App\Http\Controllers;

use App\Models\Instituicao_Estagio;
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
        $instituicao_estagio = Instituicao_Estagio::all();
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
    public function show(Instituicao_Estagio $instituicao_Estagio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instituicao_Estagio $instituicao_Estagio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instituicao_Estagio $instituicao_Estagio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instituicao_Estagio $instituicao_Estagio)
    {
        //
    }
}
