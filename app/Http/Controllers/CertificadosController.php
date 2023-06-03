<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Orientação_Estagios;
use Illuminate\Http\Request;

class CertificadosController extends Controller
{
    
    public function index()
    {
        $certificados = Orientação_Estagios::paginate();
        return view('certificados.index', compact('certificados'));
    }

}
