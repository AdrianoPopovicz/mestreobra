<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $email = $request->email;
        $password = $request->senha;
        if(Auth::attempt(['email'=> $email, 'password'=> $password, 'nivel' => 1])){
            $user = Auth::user();
            return redirect()->route('perfil');
        }
        elseif(Auth::attempt(['email'=> $email, 'password'=> $password, 'nivel' => 0])){
            return redirect()->route('cliente');
        }
        elseif(Auth::attempt(['email'=> $email, 'password'=> $password, 'nivel' => 2])){
            return redirect()->route('perfilEmpresa');
        }
        elseif(Auth::attempt(['email'=> $email, 'password'=> $password, 'nivel' => 100])){
            return redirect()->route('admin');
        }
        else{
            return redirect()->back()->with('error', 'Email ou senha incorretos!');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
