<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginUser(Request $request){
        // a variável request é um objeto do tipo Request

        if($request->method() === 'GET'){
            // a flecha (->) no php é como o ponto (.) 
            // ex: request.method()
            return view('auth.login');
        }

        // a partir daqui é caso o método seja POST
        $username = $request->username;
        $password = $request->password;
        $credentials = $request->only('username', 'password');

        print($username . " - " . $password . "<br>");
        print_r($credentials);
    }
}
