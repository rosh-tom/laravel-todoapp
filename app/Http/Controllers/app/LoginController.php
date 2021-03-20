<?php

namespace App\Http\Controllers\app;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('app.login');
    }

    public function login(Request $request){
       $credentials = $request->only('username', 'password');

       $this->validate($request, [
           'username' => 'required',
           'password' => 'required',
       ]);

       if(Auth::attempt($credentials)){

            $request->session()->regenerate();

            return redirect()->route('todo');
       }else{
            return back()->withInput($request->only('username'))->withErrors([
                'credentials' => 'The provided credentials do not match our records'
            ]);
       }


    }
}
