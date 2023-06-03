<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Curso_Aluno;
use App\Models\Instituicao_Aluno;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed'],
        'data_nascimento'  => ['required', 'date', 'max:255'],
        'cartão_cidadão'  => ['required', 'string', 'max:255'],
        'telemóvel'  => ['required', 'string', 'max:255'],
        'instituicao'  => ['required', 'string', 'max:255'],
        'numero_aluno'  => ['required', 'string', 'max:255'],
        'curso'  => ['required', 'string', 'max:255'],
    ]);

    $instituicaoAluno = Instituicao_Aluno::updateOrCreate(
        ['nome' => $request->instituicao, 'numero_aluno' => $request->numero_aluno],
        ['curso_aluno_id' => Curso_Aluno::firstOrCreate(['curso' => $request->curso])->id]
    );


$user = User::create([
    'name' => $request->name,
    'email' => $request->email,
    'password' => Hash::make($request->password),
    'data_nascimento' => $request->data_nascimento,
    'cartão_cidadão' => $request->cartão_cidadão,
    'telemóvel' => $request->telemóvel,
    'instituicao_aluno_id' => $instituicaoAluno->id,
    'instituicao' => $instituicaoAluno->nome,
    'numero_aluno' => $instituicaoAluno->numero_aluno,
    'curso_aluno_id' => $instituicaoAluno->curso_aluno_id,
    'isExterno' => true,
]);

    event(new Registered($user));

    Auth::login($user);

    return redirect(RouteServiceProvider::HOME);
}

}