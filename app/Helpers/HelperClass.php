<?php

namespace App\Helpers;

use App\Models\User;
use App\Models\laravelUsers;

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
    
    public static function sessionjoin($ar)
    {
        foreach ($ar as $id): $id = $id->id; endforeach;

        $adminEmail = User::join('laravel_users','laravel_users.sid','users.id')->where('laravel_users.sid',$id)->first();
      
        return $adminEmail;

    }

}