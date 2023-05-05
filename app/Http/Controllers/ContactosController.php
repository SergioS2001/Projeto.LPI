<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ContactosController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
{
    $users = User::with(['historico.estagio.instituicaoEstagio'])->get();
    return view('Contactos.index', compact('users'));
}


}
