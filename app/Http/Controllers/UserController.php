<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Orientadores;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //
    }

    public function makeOrientador(Request $request)
{
    $validatedData = $request->validate([
        'users_id' => 'required|exists:users,id'
    ]);

    $user = User::findOrFail($validatedData['users_id']);
    $user->isOrientador = true;
    $user->save();

    $orientador = new Orientadores();
    $orientador->users_id = $user->id;
    $orientador->save();

    return redirect()->back()->with('success', 'User successfully made orientador!');
}


}