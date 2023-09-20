<?php

namespace App\Helpers;

use App\Models\User;

class HelperClass
{
    public static function sessionSuperadmin(User $user)
    {
        if (!session()->has('adminEmail')){
            return to_route('login.index');
        }
        
        $adminEmail = [ 
            'adminEmail' => $user->where('email', session('adminEmail'))->first()
        ];

        if(!$adminEmail || !isset($adminEmail['adminEmail'])){
            session()->forget('adminEmail');
            
            return to_route('login.index'); 
        }
        
        return $adminEmail;
    }   
}