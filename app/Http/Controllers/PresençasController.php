<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Orientação_Estagios;
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
        $presenças = Orientação_Estagios::paginate();
        return view('presenças.index', compact('presenças'));
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'presença' => 'required',
            'data' => 'required|date',
            'h_entrada' => 'sometimes|date_format:H:i',
            'h_saida' => 'sometimes|date_format:H:i',
            'tempo_pausa' => 'sometimes|integer|min:0',
        ]);
    
        $presença = Presenças::findOrFail($validatedData['presença']);
    
        $presença->data = $validatedData['data'];
    
        if (isset($validatedData['h_entrada'])) {
            $presença->h_entrada = $validatedData['h_entrada'];
        }
    
        if (isset($validatedData['h_saida'])) {
            $presença->h_saida = $validatedData['h_saida'];
        }
    
        if (isset($validatedData['tempo_pausa'])) {
            $presença->tempo_pausa = $validatedData['tempo_pausa'];
        }
    
        $presença->save();
    
        return redirect()->back()->with('success', 'Presença atualizada com sucesso!');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'estagio' => 'required',
            'data' => 'required|date',
            'h_entrada' => 'required|date_format:H:i',
            'h_saida' => 'required|date_format:H:i',
            'tempo_pausa' => 'required|integer|min:0',            
        ]);
    
        $user = Auth::user();
    
        // Find the selected estágio
        $estagio = Estágios::findOrFail($validatedData['estagio']);
    
        // Check if the presença already exists for the given date and estágio
        $existingPresenca = Presenças::where([
            'data' => $validatedData['data'],
            'orientação_estagios_id' => Orientação_Estagios::where('users_id', $user->id)->where('estágios_id', $estagio->id)->first()->id,
        ])->first();

    if ($existingPresenca) {
        return redirect()->back()->with('error', 'Presença já existe para esta data e estágio!')->withInput();
    }
    
        // Create a new presença record for this date and estágio
        $presenca = new Presenças();
        $presenca->data = $validatedData['data'];
        $presenca->h_entrada = $validatedData['h_entrada'];
        $presenca->h_saida = $validatedData['h_saida'];
        $presenca->tempo_pausa = $validatedData['tempo_pausa'];
        $presenca->orientação_estagios_id = Orientação_Estagios::where('users_id', $user->id)->where('estágios_id', $estagio->id)->first()->id;
        $presenca->save();
    
        return redirect()->back()->with('success', 'Presença salva com sucesso!');
    }
    
}
