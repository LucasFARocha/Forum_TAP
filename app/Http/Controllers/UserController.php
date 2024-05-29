<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // camelCase
    // no_camel_case
    public function listAllUsers(Request $request){
        return view('users.listAllUsers');
    }

    public function listUserByID(Request $request, $uid){
        return $uid;
    }

    public function createUser(){
        return view('users.createUser');
    }

    public function editUser(){
        return view('users.editUser');
    }

    public function deleteUser(){
        return view('users.deleteUser');
    }

}
