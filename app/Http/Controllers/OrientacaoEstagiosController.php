<?php

namespace App\Http\Controllers;

use App\Models\Orientação_Estagios;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrientacaoEstagiosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orientação = Orientação_Estagios::paginate();
        return view('orientação.index', compact('orientação'));
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
    public function show(Orientação_Estagios $orientacao_Estagios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orientação_Estagios $orientacao_Estagios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orientação_Estagios $orientacao_Estagios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orientação_Estagios $orientacao_Estagios)
    {
        //
    }
}
