<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginUser(Request $request){
        // a variável request é um objeto do tipo Request

        if($request->method() === 'GET'){
            // a flecha (->) no php é como o ponto (.) 
            // ex: request.method()
            return view('auth.login');
        }
        else
        {
            $credentials = $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string'
            ]);

            if(Auth::attempt($credentials))
            {
                return redirect()
                ->intended('/users')
                ->with('success', 'Login realizado com sucesso');
            }
            return back()->withErrors([
                'email' => 'Credenciais inválidas'
            ])->withInput();
        }

        // // a partir daqui é caso o método seja POST
        // // é o else do if
        // $username = $request->username;
        // $password = $request->password;
        // $credentials = $request->only('username', 'password');

        // print($username . " - " . $password . "<br>");
        // print_r($credentials);
    }

    public function logoutUser(Request $request)
    {
        Auth::logout();
        return redirect()
            ->route('routeLoginUser')
            ->with('success', 'Logout realizado com sucesso');
    }
}
