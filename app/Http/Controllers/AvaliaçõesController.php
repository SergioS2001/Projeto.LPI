<?php

namespace App\Http\Controllers;

use App\Models\AvaliacaoModulos;
use App\Models\Avaliações;
use App\Http\Controllers\Controller;
use App\Models\Modulos;
use App\Models\Orientação_Estagios;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function storeAvaliação(Request $request)
{
    // Retrieve the values from the form input fields
    $estagio_id = $request->input('orientacao_estagios_id');
    $aluno_id = $request->input('aluno');
    $nota_final = $request->input('nota_final');

    // Find the orientação_estagios_id based on the estagio_id and aluno_id
    $orientacao_estagios_id = Orientação_Estagios::where('estágios_id', $estagio_id)
        ->where('users_id', $aluno_id)
        ->value('id');

    // Create a new instance of the Avaliações model
    $avaliacao = new Avaliações();
    $avaliacao->orientação_estagios_id = $orientacao_estagios_id;
    $avaliacao->nota_final = $nota_final;

    // Save the Avaliações model
    $avaliacao->save();

    return redirect()->route('avaliações.index')->with('success', 'Avaliação criada com sucesso!');
}
    
public function getAlunosByEstagio(Request $request)
{
    $estagioId = $request->input('estagio_id');

    // Fetch the Aluno options based on the selected Estágio
    $alunos = User::whereIn('id', function($query) use ($estagioId) {
        $query->select('users_id')->from('orientação_estagios')
            ->where('estágios_id', $estagioId);
    })->get();

    return response()->json($alunos);
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
