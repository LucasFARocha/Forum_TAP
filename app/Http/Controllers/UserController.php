<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    // camelCase
    // no_camel_case

    public function listAllUsers(Request $request){
        $users = User::all();

        return view('user.listAllUsers', ['users' => $users]);
    }

    public function listUserByID(Request $request, $uid){
        $user = User::where('id', $uid)->first();

        return view('user.listUserByID', ['user' => $user]);
    }

    public function registerUser(Request $request){
        if($request->method() === 'GET')
        {
            return view('auth.register');
        }
        else
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed'
            ]);
    
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
    
            Auth::login($user);
    
            return view('index');
        }
    }

    public function editUser(Request $request, $uid){
        $user = User::where('id', $uid)->first();

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != '')
        {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        
        return redirect()
            ->route('routeListUserByID', [$user->id])
            ->with('message', 'Atualizado com sucesso!');
    }

    public function deleteUser(Request $request, $uid){
        User::where('id', $uid)->delete();

        return redirect()
            ->route('routeListAllUsers')
            ->with('message', 'Excluído com sucesso!');
    }

}
