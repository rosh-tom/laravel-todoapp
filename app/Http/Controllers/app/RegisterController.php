<?php

namespace App\Http\Controllers\app;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('app.register');
    }

    public function register(Request $request){
        $this->validate($request, [
            'firstname' => 'required|max:255',
            'lastname'  => 'required|max:255',
            'username'  => 'required|max:255|unique:users',
            'password'  => 'required|confirmed',
        ]);

        try {
            $user = User::create([
                'firstname' => $request->firstname,
                'lastname'  => $request->lastname,
                'username'  => $request->username,
                'password'  => Hash::make($request->password), 
            ]);
            return redirect()->route('login')->with('message', 'Please Log in');
        } catch (\Throwable $th) {
            return back()->withInput()->with('message', 'Something went wrong. Please try again later.'); 
        }
    
        
       
    } 
}
