<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RgistrasiLoginController extends Controller
{
    //function untuk menampilkan view login
    public function login()
    {
        return view('RegisterLogin.login', [
            'title' => 'Login'
        ]);
    }


    // Funtion untuk menampilkan view registrasi
    public function registrasi()
    {
        return view('RegisterLogin.registrasi', [
            'title' => 'Registration'
        ]);
    }

    // Function untuk proses registrasi
    public function registrasiProses(Request $request)
    {
        $validateData = $request->validate([
            'nickname' => ['required', 'min:5', 'max:255'],
            'fullname' => ['required', 'min:5', 'max:255'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:5', 'max:255']
        ]);

        $validateData['password'] = bcrypt($validateData['password']);
        User::create($validateData);
        return redirect('/login')->with('success', 'Successful registration');
    }

    // Function untuk proses login
    public function loginProses(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }else{
            return redirect('/login')->with('success','Wrong email or password');
        }
    }

    // Function untuk proses logout
    public function logout(Request $request)
    {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login')->with('success', 'Made it out');
    }

}
