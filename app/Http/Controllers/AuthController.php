<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest', 'guest:admin', 'guest:guru'], ['except' => 'logout']);
    }

    public function loginPage()
    {
        return view('auth.login-siswa');
    }

    public function loginPageGuru()
    {
        return view('auth.login-guru');
    }

    public function loginPageAdmin()
    {
        $cek = Admin::all()->count();
        if (!$cek) {
            $a = new Admin;
            $a->username = 'admin';
            $a->nama = 'Administrator';
            $a->password = bcrypt('admin');
            $a->save();
        }
        return view('auth.login-admin');
    }

    public function loginAdmin(Request $req)
    {
        if (Auth::guard('admin')->attempt(['username' => $req->username, 'password' => $req->password])) {
            return redirect('/admin');
        }
        return redirect('/admin/login');
    }

    public function loginGuru(Request $req)
    {
        if (Auth::guard('guru')->attempt(['username' => $req->username, 'password' => $req->password])) {
            return redirect('/guru');
        }
        return redirect('/guru/login');
    }

    public function login(Request $req)
    {
        if (Auth::attempt(['nis' => $req->username, 'password' => $req->password])) {
            return redirect('/');
        }
        return redirect('/login');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        Auth::guard('guru')->logout();
        Auth::logout();
        return redirect('/login');

    }
}
