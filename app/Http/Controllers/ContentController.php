<?php

namespace App\Http\Controllers;

use App\Helpers\HelperClass;
use App\Http\Controllers\loginValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

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
    
    
   
}
