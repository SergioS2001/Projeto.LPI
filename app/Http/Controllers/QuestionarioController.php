<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Orientação_Estagios;
use App\Models\Questionário_Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questionario = Questionário_Aluno::paginate();
    return view('questionário.index', compact('questionario'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'estagio' => 'required',
            'integração' => 'required',
            'acompanhamento' => 'required',
            'aquisição_conhecimentos' => 'required',
            'disponibilidade' => 'required',
            'satisfação' => 'required',
            'apoio_administrativo' => 'required',
            'apoio_orientador' => 'required',
            'apreciação_global' => 'required',
            'sugestões' => 'nullable|string',
        ]);
    
        $selectedEstagio = $request->input('estagio');
        $orientacaoEstagio = Orientação_Estagios::where('estágios_id', $selectedEstagio)
            ->where('users_id', Auth::id())
            ->firstOrFail();

        $questionarioAluno = new Questionário_Aluno();
        $questionarioAluno->orientação_estagios_id = $orientacaoEstagio->id;
        $questionarioAluno->integração = $request->input('integração');
        $questionarioAluno->acompanhamento = $request->input('acompanhamento');
        $questionarioAluno->aquisição_conhecimentos = $request->input('aquisição_conhecimentos');
        $questionarioAluno->disponibilidade = $request->input('disponibilidade');
        $questionarioAluno->satisfação = $request->input('satisfação');
        $questionarioAluno->apoio_administrativo = $request->input('apoio_administrativo');
        $questionarioAluno->apoio_orientador = $request->input('apoio_orientador');
        $questionarioAluno->apreciação_global = $request->input('apreciação_global');
        $questionarioAluno->sugestões = $request->input('sugestões');
        $questionarioAluno->save();

        // Update the questionario_done variable in orientação_estagios table
    $orientacaoEstagio->questionario_done = true;
    $orientacaoEstagio->save();
        return redirect()->route('questionário.index')->with('success', 'Questionário enviado com sucesso!');
    }

}
