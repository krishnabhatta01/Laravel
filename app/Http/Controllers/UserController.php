<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //show Register/create formFields
    public function create(){
        return view('users.register');
    }

    //create new users
    public function store(Request $request){
        $formFields= $request->validate([
            'name' => ['required','min:3'],
            'email'=>['required','email',Rule::unique('users','email')],
            'password' => 'required|confirmed|min:6'
        ]); 

        //Hash passwords
        $formFields['password']= bcrypt($formFields['password']);

        //create User
        $user = User::create($formFields);

        //login
        auth()->login($user);
        return redirect('/')->with('message','User created and logged in');
    }

    //Logout
    public function logout(){
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/')->with('message','You have been logout');
    }

    //show login form
    public function login(){
        return view('users.login');
    }

    //Authenticate User
    public function authenticate(){
        $formFields = request()->validate([
            
            'email' => ['required', 'email'],
            'password' => 'required'
        ]); 

        if(auth()->attempt($formFields)){
            request()->session()->regenerate();

            return redirect('/')->with('message','Youare now logged in');
        }

        return back()->withErrors(['email'=>'invalid credentials'])->onlyInput('email');
    }
}
