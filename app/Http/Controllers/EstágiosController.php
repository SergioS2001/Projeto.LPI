<?php

namespace App\Http\Controllers;

use App\Models\Estágios;
use App\Models\Instituição_Estágio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstágiosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estágios = Estágios::paginate();
        return view('estágios.index', compact('estágios'));
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
    // Validate the form data
    $request->validate([
        'nome' => 'required|string|max:255',
        'instituicao_estagio_id' => 'required|integer',
        'curso_estagio_id' => 'required|integer',
        'unidade_curricular_id' => 'required|integer',
        'ano_curricular' => 'required|string|max:255',
        'servico_id' => 'required|integer',
        'tipologia_estagio_id' => 'required|integer',
        'data_inicial' => 'required|date',
        'data_final' => 'required|date|after_or_equal:data_inicial',
    ]);

    // Create a new instance of the Estagio model
    $estagio = new Estágios;

    // Set the values of the model attributes based on the form data
    $estagio->nome = $request->nome;
    $estagio->instituicao_estagio_id = $request->instituicao_estagio_id;
    $estagio->curso_estagio_id = $request->curso_estagio_id;
    $estagio->unidade_curricular_id = $request->unidade_curricular_id;
    $estagio->ano_curricular = $request->ano_curricular;
    $estagio->servico_id = $request->servico_id;
    $estagio->tipologia_estagio_id = $request->tipologia_estagio_id;
    $estagio->data_inicial = $request->data_inicial;
    $estagio->data_final = $request->data_final;

    $instituicao_estagio = Instituição_Estágio::all();
    return view('estágios-form', compact('instituicao_estagio'));
    

    // Save the new Estagio model instance to the database
    $estagio->save();

    // Redirect the user back to the index page with a success message
    return redirect()->route('estágios.index')->with('success', 'Estágio criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(EstágiosController $estágiosController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EstágiosController $estágiosController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EstágiosController $estágiosController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EstágiosController $estágiosController)
    {
        //
    }
}
