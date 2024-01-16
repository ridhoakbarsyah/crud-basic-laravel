<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
// use Symfony\Contracts\Service\Attribute\Required;

class SessionController extends Controller
{
    function index()
    {
        return view("sesi/index");
    }

    // untuk login
    function login(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email harus di isi',
            'password.required' => 'Password harus di isi',
        ]);

        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($login)) {
            return redirect('student')->with('sukses', 'berhasil login');
        } else {
            return redirect('sesi')->withErrors('Username dan Password Tidak Valid');
        }
    }

    // untuk logout 
    function logout()
    {
        Auth::logout();
        return redirect('sesi')->with('success', 'berhasil logout');
    }

    function register()
    {
        return view('sesi/register');
    }

    // untuk memasukkan data 
    function create(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ], [
            'name.required' => 'Nama harus di isi',
            'email.required' => 'Email harus di isi',
            'email.email' => 'Silahkan masukkan email anda',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Password harus di isi',
            'password.min' => 'Masukkan password yang valid'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        ModelsUser::create($data);

        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($login)) {
            return redirect('student')->with('sukses', Auth::user()->name . 'berhasil login');
        } else {
            return redirect('sesi')->withErrors('Username dan Password Tidak Valid');
        }
    }
}
