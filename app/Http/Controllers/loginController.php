<?php

namespace App\Http\Controllers;

use App\Helpers\HelperClass;
use App\Http\Controllers\loginValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\laravelUsers;
use Illuminate\Http\RedirectResponse;

class loginController extends Controller
{
    public function loginPage()
    {
        if (session()->has('adminEmail')){
            return to_route('adminindex');
        }

        $response = response()
            ->view('index')
            ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');
            
        return $response;
    }

    public function login(Request $request, User $user, loginValidator $loginvalidator)
    {
        $valid =  $loginvalidator->loginValidation($request);

        if($valid->fails()){
            return response()->json(['error' => $valid->errors()->all()],400);
        }

        $validated = $valid->validated();

        $users = $user->where('email', $validated['email'])->first();

        if (!$users) return response()->json(['error' => 'Email does not exist.'],400);

        if (!Hash::check($validated['password'], $users->password)){
            return response()->json(['error' => 'Password does not exist.'],400);
        }

        $request->session()->put('adminEmail',$users->email);

    }

    public function index(User $user)
    {
       
        $adminEmail = HelperClass::sessionSuperadmin($user);
       
      
        
        // $adminEmail = HelperClass::sessionjoin($ar);
        
        if($adminEmail instanceof RedirectResponse){
            return $adminEmail; 
        } 
        // dump($adminEmail);
        $response = response()
            ->view('admin.index', $adminEmail)
            ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');
            
        return $response;
    }

    public function logout()
    {
        if(session()->has('adminEmail')) session()->forget('adminEmail');
    
        return to_route('login.index');
    }

}
