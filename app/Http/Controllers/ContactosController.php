<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class ContactosController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
{
    $contactos = User::paginate();
    return view('contactos.index', compact('contactos'));
}


}
