<?php

namespace App\Http\Controllers;

use App\Models\Histórico;
use App\Http\Controllers\Controller;
use App\Models\Presenças;
use App\Models\Estágios;
use Illuminate\Http\Request;

class PresençasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presenças = Histórico::paginate();
        return view('presenças.index', compact('presenças'));
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
        $validatedData = $request->validate([
            'estagio_id' => 'required',
            'data' => 'required|date',
            'h_entrada' => 'required|numeric|min:1|max:24',
            'h_saida' => 'required|numeric|min:1|max:24',
            'h_pausa' => 'required|numeric|min:1|max:5',
        ]);
    
        $estagio = Estágios::findOrFail($validatedData['estagio_id']);
    
        $presenca = $estagio->presenças()->where('data', $validatedData['data'])->first();
    
        if (!$presenca) {
            $presenca = new Presenças();
            $presenca->data = $validatedData['data'];
        }
    
        $presenca->h_entrada = $validatedData['h_entrada'];
        $presenca->h_saida = $validatedData['h_saida'];
        $presenca->h_pausa = $validatedData['h_pausa'];
    
        $estagio->presenças()->save($presenca);
    
        return redirect()->back()->with('success', 'Presença salva com sucesso!');
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
