<?php

namespace App\Http\Controllers;

use App\Models\Orientação_Estagios;
use App\Http\Controllers\Controller;
use App\Models\Presenças;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrientacaoEstagiosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $orientador_id = auth()->user()->id;

    $orientação = Orientação_Estagios::whereHas('estágios', function($query) use ($orientador_id) {
        $query->where('orientadores_id', $orientador_id);
    })->with('estágios', 'users')->get();

    return view('orientação.index', compact('orientação'));
}

public function update(Request $request, $presença)
{
    $presença = Presenças::find($presença);

    if (!$presença) {
        return redirect()->back()->with('error', 'Presença não encontrada.');
    }

    $presença->isValidated = true;
    $presença->save();

    return redirect()->back()->with('success', 'Presença validada com sucesso.');
}


public function search(Request $request)
{
    $orientador_id = auth()->user()->id;

    $query = Orientação_Estagios::whereHas('estágios', function($query) use ($orientador_id) {
        $query->where('orientadores_id', $orientador_id);
    })->with('estágios', 'users');

    // Apply search filter
    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where(function($q) use ($search) {
            $q->where('data', 'like', '%' . $search . '%')
              ->orWhere('h_entrada', 'like', '%' . $search . '%')
              ->orWhere('h_saida', 'like', '%' . $search . '%')
              ->orWhereHas('estágios', function($q) use ($search) {
                  $q->where('nome', 'like', '%' . $search . '%');
              })
              ->orWhereHas('users', function($q) use ($search) {
                  $q->where('name', 'like', '%' . $search . '%');
              });
        });
    }

    $orientação = $query->get();

    return view('orientação.search_rows', compact('orientação'))->render();
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


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orientação_Estagios $orientacao_Estagios)
    {
        //
    }
}
