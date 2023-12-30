<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller{
    
    public function index(){
        return view('register.index', [
            "title" => "register"
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => [ 'required', Password::min(3)/* ->mixedCase()->letters()->numbers()->symbols()->uncompromised() */],
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'registration successfull! please login.');
    }
}
