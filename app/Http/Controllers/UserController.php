<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // camelCase
    // no_camel_case
    public function listAllUsers(){
        return view('users.listAllUsers');
    }

    public function listUserByID(){
        return view('users.listUserByID');
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
