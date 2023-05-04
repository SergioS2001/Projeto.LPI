<?php

namespace App\Http\Controllers;

use App\Models\Histórico;
use App\Http\Controllers\Controller;
use App\Models\Presenças;
use App\Models\Estágios;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'estagio' => 'required',
            'data' => 'required|date',
            'h_entrada' => 'required|numeric|min:1|max:24',
            'h_saida' => 'required|numeric|min:1|max:24',
            'h_pausa' => 'required|numeric|min:1|max:5',
        ]);
    
        $user = Auth::user();
    
        // Find the selected estágio
        $estagio = Estágios::findOrFail($validatedData['estagio']);
    
        // Find or create the user's historico record for this estágio
        $historico = $user->historico_id;
        if (!$historico) {
            $historico = new Histórico();
            $historico->estágios_id = $estagio->id;
            $historico->agendamentos_id = null; // set the default value to null
            $historico->save();
        }
    
        // Find or create the presença record for this date and estágio
        $presenca = Presenças::firstOrCreate([
            'data' => $validatedData['data'],
            'estágios_id' => $estagio->id,
        ]);
    
        // Update the presença record
        $presenca->h_entrada = $validatedData['h_entrada'];
        $presenca->h_saida = $validatedData['h_saida'];
        $presenca->h_pausa = $validatedData['h_pausa'];
        $presenca->save();
    
        // Update the historico record
        $historico->presenças_id = $presenca->id;
        $historico->save();
    
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
