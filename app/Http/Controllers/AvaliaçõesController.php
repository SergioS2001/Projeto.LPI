<?php

namespace App\Http\Controllers;

use App\Models\AvaliacaoModulos;
use App\Models\Avaliações;
use App\Http\Controllers\Controller;
use App\Models\Modulos;
use App\Models\Orientação_Estagios;
use Illuminate\Http\Request;

class AvaliaçõesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avaliações = Avaliações::all();
        return view('avaliações.index', compact('avaliações'));
    }

    public function storeModulos(Request $request)
{
    $request->validate([
        'orientacao_estagios_id' => 'required',
        'aluno' => 'required',
        'module_count' => 'required|integer|min:0',
        // Add validation rules for module names and notas
        'module.*.nome' => 'required',
        'module.*.nota' => 'required|numeric|min:0|max:10',
        'nota_final' => 'required|integer|min:1|max:20',
    ]);

    // Check for duplicate entries
    $existingAvaliacao = Avaliações::where('orientação_estagios_id', $request->input('orientacao_estagios_id'))->first();
    if ($existingAvaliacao) {
        return redirect()->route('avaliações.index')->with('error', 'Já existe uma avaliação para este estágio/EC!');
    }

    $avaliacao = new Avaliações();
    $avaliacao->orientação_estagios_id = $request->input('orientacao_estagios_id');
    $avaliacao->module_count = $request->input('module_count');
    // Save other fields from the form to the Avaliacao model
    $avaliacao->save();

    $avaliacaoModulos = [];
    for ($i = 1; $i <= $request->module_count; $i++) {
        $modulo = new Modulos;
        $modulo->nome = $request->input('module' . $i . '_nome');
        $modulo->nota = $request->input('module' . $i . '_nota');
        $modulo->save();

        $avaliacaoModulo = new AvaliacaoModulos;
        $avaliacaoModulo->avaliacoes_id = $avaliacao->id;
        $avaliacaoModulo->modulos_id = $modulo->id;
        $avaliacaoModulo->save();

        $avaliacaoModulos[] = $avaliacaoModulo->id;
    }

    $avaliacao->avaliacaoModulos()->attach($avaliacaoModulos);


    return redirect()->route('avaliações.index')->with('success', 'Número de módulos salvo com sucesso!');
}
    
    public function store(Request $request)
{
    // Validate the incoming request
    $validatedData = $request->validate([
        'estagio' => 'required',
        'aluno' => 'required',
        'module_count' => 'required|integer|min:1',
        // Add validation rules for module names and notas
        'module.*.nome' => 'required',
        'module.*.nota' => 'required|numeric|min:0|max:10',
    ]);

    // Retrieve the input values
    $estagioId = $validatedData['estagio'];
    $alunoId = $validatedData['aluno'];
    $moduleCount = $validatedData['module_count'];
    $modules = $validatedData['module'];

    // Save the main record (orientacao_estagio_id, aluno_id, etc.)
    $avaliacao = new Avaliações;
    $avaliacao->orientacao_estagio_id = $estagioId;
    $avaliacao->aluno_id = $alunoId;
    // Save any other fields as needed
    $avaliacao->save();

    // Save the module records
    for ($i = 0; $i < $moduleCount; $i++) {
        $module = new Modulos;
        $module->avaliacao_id = $avaliacao->id;
        $module->nome = $modules[$i]['nome'];
        $module->nota = $modules[$i]['nota'];
        // Save any other fields as needed
        $module->save();
    }

    return redirect()->back()->with('success', 'Avaliação salva com sucesso!');
}

}
