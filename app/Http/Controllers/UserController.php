<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.signin');
    }

    public function saveData(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|string',
            'password' => 'required|string',
        ]);

        dd($request->all());
    }
}
