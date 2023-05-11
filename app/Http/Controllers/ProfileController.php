<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Curso_Aluno;
use App\Models\Info_Emergência;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
{

    $request->user()->fill([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'email_alternativo' => $request->input('email_alternativo'),
        'telemóvel' => $request->input('telemóvel'),
        'data_nascimento' => $request->input('data_nascimento'),
        'morada' => $request->input('morada'),
        'cartão_cidadão' => $request->input('cartão_cidadão'),
    ]);

    if ($request->user()->isDirty('email')) {
        $request->user()->email_verified_at = null;
    }

    $request->user()->save();

    return Redirect::route('profile.edit')->with('status', 'profile-updated');
}

public function saveEmergência(Request $request)
    {
        $user = Auth::user();
        $infoEmergencia = $user->info_emergência;

    if (!$infoEmergencia) {
        // Create a new InfoEmergencia instance if it doesn't exist for the user
        $infoEmergencia = new Info_Emergência();
    }

    // Update the fields with the submitted values
    $infoEmergencia->nome = $request->input('nome');
    $infoEmergencia->grau_parentesco = $request->input('grau_parentesco');
    $infoEmergencia->telemóvel = $request->input('telemóvel');

    // Save the changes
    $infoEmergencia->save();

    return redirect()->back()->with('status', 'emergência-updated');
    }

    
public function saveCurso(Request $request)
{
    $user = Auth::user();

    // Get the current user's instituicao_aluno
    $instituicaoAluno = $user->instituicao_Aluno;

    // Get the existing curso_aluno for this instituicao_aluno
    $cursoAluno = $instituicaoAluno->curso_aluno;

    if (!$cursoAluno) {
        // If the instituicao_aluno doesn't have a curso_aluno, create one
        $cursoAluno = new Curso_Aluno();
    }

    // Check if a record with the same curso already exists
    $existingCurso = Curso_Aluno::where('curso', $request->input('curso'))->first();
    if ($existingCurso) {
        // If so, update the existing record instead of creating a new one
        $cursoAluno = $existingCurso;
    }

    // Set the curso field on the curso_aluno object
    $cursoAluno->curso = $request->input('curso');

    // Save the curso_aluno object
    $cursoAluno->save();

    // Associate the curso_aluno with the instituicao_aluno
    $instituicaoAluno->curso_aluno_id = $cursoAluno->id;
    $instituicaoAluno->save();

    return redirect()->back()->with('status', 'curso-updated');
}


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
