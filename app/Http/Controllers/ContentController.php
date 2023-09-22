<?php

namespace App\Http\Controllers;

use App\Helpers\HelperClass;
use App\Http\Requests\AccountRequest;
use App\Http\Controllers\loginValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Validator;

class ContentController extends Controller
{
    public function profileIndex(User $user){
    
        $adminEmail = HelperClass::sessionSuperadmin($user);

        if($adminEmail instanceof RedirectResponse){
            return $adminEmail; 
        } 

        $response = response()
            ->view('admin.profile', $adminEmail)
            ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');
            
        return $response;
    }
    
    public function accountsIndex(User $user){
    
        $adminEmail = HelperClass::sessionSuperadmin($user);

        if($adminEmail instanceof RedirectResponse){
            return $adminEmail; 
        } 

        $response = response()
            ->view('admin.useraccount', $adminEmail)
            ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');
            
        return $response;
    }
    
    public function storedata(Request $request, User $user){
        // func thru folder
        

        $validator = Validator::make($request->all(), [
            'emailV2' => 'required|email|ends_with:@gmail.com,@yahoo.com',
            'passwordV2' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // 422 Unprocessable Entity status code for validation errors
        }

        $requests = $validator->validated();

        $faker = Faker::create();
        if(!$requests){
            return response()->json(['error' => 'dshauidhasuhdi']);
        }

        $user->create([
            'email' => $requests['emailV2'],
            'password' => bcrypt($requests['passwordV2']),
            'name' => $faker->name
        ]);

        return response()->json(['message' => 'Registration successful']);


    }
    
   
}
