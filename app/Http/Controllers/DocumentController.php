<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Helpers\HelperClass;

class DocumentController extends Controller
{
    //
    public function indexAction(User $user)
    {
        $adminEmail = HelperClass::sessionSuperadmin($user);
        $adminEmail = HelperClass::sessionjoin($adminEmail);

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
