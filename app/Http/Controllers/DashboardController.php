<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
{
    
}

public function update(Request $request)
{
    $user = User::find(Auth::id());
    $user->politica_dados_accepted = 1;
    $user->save();

    return redirect()->back()->with('success', 'Política de dados aceite com sucesso!');
}

public function updateconf(Request $request)
{
    $user = User::find(Auth::id());
    $user->decl_conf_accepted = 1;
    $user->save();

    return redirect()->back()->with('success', 'Declaração de Confidencialidade aceite com sucesso!');
}

public function updateProfile(Request $request)
{
    $user = User::find(Auth::id());
    $user->profile_updated = 1;
    $user->save();

    return redirect()->route('profile.edit')->with('success');
}


}
