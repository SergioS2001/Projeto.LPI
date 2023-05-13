<?php

namespace App\Http\Controllers;

use App\Models\Agendamentos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgendamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendamentos = Agendamentos::all();
        return view('agendamentos.index', compact('agendamentos'));
    }

}
