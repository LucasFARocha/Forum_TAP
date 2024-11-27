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

    public function listAllUsers(){
        $users = User::all();

        return view('user.listAllUsers', ['users' => $users]);
    }

    public function listUserByID($uid){
        // if(is_null($uid)){
        //     return 0;
        // }
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
            
            return redirect()->route('routeHome');
        }
    }

    public function editUser(Request $request, $uid){
        if($request->method() === 'GET'){
            return view('user.editUser');
        }
        else
        {
            
            $user = User::where('id', $uid)->first();
            
            if($request->name != ''){
                $request->validate(['name' => 'string|max:255']);
                $user->name = $request->name;
            }
            if($request->email != ''){
                $request->validate(['email' => 'string|email|max:255|unique:users']);
                $user->email = $request->email;
            }
            if($request->password != '')
            {
                $request->validate(['password' => 'string|min:8']);
                $user->password = Hash::make($request->password);
            }
            if($request->image != null)
            {
                $request->validate(['image' => 'image|mimes:jpeg,jpg,png,gif|max:2048']);
                
                $imagePath = $request->file('image')->store('images', 'public');
                $user->photo = $imagePath;
            }
            

            $user->save();
            
            return redirect()
                ->route('routeListUserByID', [$user->id])
                ->with('message', 'Atualizado com sucesso!');
        }

    }

    public function deleteUser(Request $request, $uid){
        User::where('id', $uid)->delete();

        return redirect()
            ->route('routeHome')
            ->with('message', 'Excluído com sucesso!');
    }

}
