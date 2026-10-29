<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function loginView(){
        return view('auth.login');
    }

    public function loginPost(Request $request){
        
        $credentials = $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required']
        ]);

        //login validate
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('students.index');
        }

        return back()->withErrors([
            'email' => "Email or Password does not match"
        ]);
    }
    

    public function registerView(){
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        //Validate Request
        $validatedRequest = $request->validate([
            'name' => ['required','string'],
            'email' => ['required','string','email','unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        User::create([
            'name' => $validatedRequest['name'],
            'email' => $validatedRequest['email'],
            'password' => ($validatedRequest['password']),
            'role' => 'student',
        ]);

        //Handle if success
        return redirect()->route('login-view');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        //handle
        return redirect()->route('login-view');
    }
}
