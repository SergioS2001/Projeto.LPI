<?php

namespace App\Http\Controllers;

use App\Models\Histórico;
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

public function update(Request $request, Presenças $presenca)
{
    $presenca->isValidated = true;
    $presenca->save();

    $historico = Histórico::where('estágios_id', $request->estágios_id)
        ->where(function($query) use ($request) {
            $query->where('users_id', Auth::id())
                ->orWhere(function($query) use ($request) {
                    $query->where('isOrientador', true)
                        ->where('users_id', $request->orientador_id);
                });
        })
        ->first();

    if ($historico) {
        $historico->presenças += 1;
        $historico->save();
    }

    return redirect()->back()->with('success', 'Presença validada com sucesso.');
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


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orientação_Estagios $orientacao_Estagios)
    {
        //
    }
}
