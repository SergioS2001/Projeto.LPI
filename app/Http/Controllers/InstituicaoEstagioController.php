<?php

namespace App\Http\Controllers;

use App\Models\Instituição_Estágio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstituicaoEstagioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $instituicao_estagio = Instituição_Estágio::all();
        return view('estágios.create', compact('instituicao_estagio'));
    }

}
