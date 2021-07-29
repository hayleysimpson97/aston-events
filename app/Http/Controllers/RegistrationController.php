<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store(Request $request)
    {
        $confirmPassword = $request->confirm_password;

        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'phone_number'=>'required'
        ]);

        if($confirmPassword != $request->password){
            return redirect('/register');
        }

        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone_number' => $request->phone_number
        ]);

        auth()->login($newUser);

        return redirect('/');
    }
}
