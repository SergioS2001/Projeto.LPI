<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use  \Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\AbstractProvider;

class GoogleAuthController extends Controller
{
    #para esta função apenas redirecionamos o user para os serviços da google
    public function redirect()
    {
        
        return Socialite::driver('google')->redirect();
        }

    #esta função faz a gestão de base de dados sobre o user que esta a fazer login por google
    public function callbackGoogle()
    {
        try{
             // Add these lines to disable SSL verification
             
            $curl = curl_init();/*
            curl_setopt($curl, CURLOPT_URL, "https://127.0.0.1/");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($curl);
            curl_close($curl);
            #adquire a informação sobre o user
            */
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $google_user = Socialite::driver('google')->user();

            #pesquisa nas tabelas sobre este google id a ver se existe na BD
            $user = User::where('google_id', $google_user->getId())->first();
        #se não existir na BD, irá adicionar a sua info(basica para já) na base de dados 
        #neste caso pode ser necessario expandir o numero de infos requiridas pelos user, para já o base   
        if(!$user){
            $new_user = User::create(
                [
                    'name' =>$google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' =>$google_user->getId(),
                
                ]);
                #guarda a sua info e passa por fazer o login desse user com os dados fornecidos
               Auth::login($new_user);
                return redirect()->intended('dashboard');
        }
        #caso ele já esteja na BD passa normal os dados para o login
        else{
            Auth::login($user);
            return redirect()->intended('dashboard');

        }
        #caso existe algum erro pelo caminho envia msg de erro
    }catch(\Throwable $th){
        dd('Error'. $th->getMessage());

    }
}

}
