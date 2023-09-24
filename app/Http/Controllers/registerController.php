<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\laravelUsers;
use Faker\Factory as Faker;

class registerController extends Controller
{
    public function registration()
    {
        return view('register');
    }

    public function registrationinfo(Request $request)
    {
        // dump($request->all());
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
        if($request->roleSelector != null):
            $users = User::join('laravel_users as lu','users.id','lu.sid')->where('lu.user_type',$request->roleSelector)->get(); 
        else:
            $users = User::join('laravel_users','laravel_users.sid','users.id')->get(); 
        endif;
       

        return response()->json($users);

    }

    public function deleteData(Request $request)
    {
        // dump($request->all());
        // Find the record by its ID
        $record = User::join('laravel_users as lu','users.id','lu.sid')->find($request->id);
        // Check if the record exists
        if (!$record) {
            return response()->json(['success' => false, 'message' => 'Record not found'], 404);
        }
        // Delete the record
        $record->delete();

        return response()->json(['success' => true, 'message' => 'Record deleted successfully']);
    }

}
