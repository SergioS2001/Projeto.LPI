<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Instituicao_Aluno;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();
        $email = $googleUser->getEmail();

        // Check if the user's email ends with '@ufp.edu.pt'
         if (!Str::endsWith($email, '@ufp.edu.pt')) {
        return redirect('/')->withErrors(['message' => 'You must be a UFP student to login. Please create a new account to login.']);
        }

        // Extracting the user's student number from their email
        $studentNumber = explode('@', $googleUser->email)[0];
    
        // Fetching the Instituicao model for Universidade Fernando Pessoa
        $instituicao = Instituicao_Aluno::where('nome', 'Universidade Fernando Pessoa')->first();
    
        $user = User::updateOrCreate([
            'google_id' => $googleUser->id,     //if exists get id
        ], [                            
            'name' => $googleUser->name,       //if not, create user
            'email' => $googleUser->email,  
            'google_token' => $googleUser->token,
            'instituicao_aluno_id' => $instituicao->id,
            'instituicao_Aluno' => $instituicao, // set the relationship with the Instituicao_Aluno model
            'isExterno' => false, // Set isExterno to false for Google sign-ins
        ]);
        
        // Retrieve the Instituicao_Aluno model associated with the user
        $instituicao_aluno = $user->instituicao_Aluno;

        // Update the student number
        $instituicao_aluno->numero_aluno = $studentNumber;
        $instituicao_aluno->save();

        Auth::login($user);

        return redirect('/dashboard');
        
        //dd($googleUser);        //check info from google auth in web
    }

}
