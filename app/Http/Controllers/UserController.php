<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function submitUser()
    {
        return view('SubmitUser');
    }

    public function removeUser()
    {
        return view('SubmitUser');
    }
}
