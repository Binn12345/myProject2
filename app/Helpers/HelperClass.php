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
        
        // dump(session('adminEmail'));
        
        $adminEmail = [ 
            'adminEmail' => $user->select('id')->where('email', session('adminEmail'))->first()
        ];
      
        
    
        if(!$adminEmail || !isset($adminEmail['adminEmail'])){
            session()->forget('adminEmail');
            
            return to_route('login.index'); 
        }
        
        return $adminEmail;
    }   

    public static function sessionjoin($id)
    {
        foreach ( $id as $item):

        endforeach;
    }
}