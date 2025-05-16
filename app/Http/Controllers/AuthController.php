<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function proseslogin(Request $request)
    {
        if (Auth::guard('mahasiswa')->attempt(['npm' => $request->npm, 'password' => $request->password])) {
            echo "Berhasil Login";   // ... kode di dalam if ...
        } else {
            echo "NPM atau Password Salah";
        }
    }
}
