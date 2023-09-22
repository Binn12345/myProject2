<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Faker\Factory as Faker;

class registerController extends Controller
{
    public function registration()
    {
        return view('register');
    }

    public function registrationinfo(Request $request)
    {
        // Create an instance of Faker
        $faker = Faker::create();

        // Generate a fake name (you can customize this)
        $dummyName = $faker->name;

        // Validate the form data
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

    
        $user = new User();
        $user->name = $dummyName;
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password')); // Hash the password
        $user->save();

        // Return a response (you can customize this as needed)
        return response()->json(['message' => 'Registration successful']);

    }

    public function store(Request $request)
    {
        $users = User::get();

        return response()->json($users);

    }

}
