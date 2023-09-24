<?php 

namespace App\Classes;
use App\Helpers\HelperClass;

class sessionClass
{
    public static function session($param)
    {
        $adminEmail = HelperClass::sessionSuperadmin($param);
        $adminEmail = HelperClass::sessionjoin($adminEmail);

        if($adminEmail instanceof RedirectResponse){
            
            return $adminEmail; 
        } 
     
        $response = response()
            ->view('admin.index', $adminEmail)
            ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');
            
        return $response;
    }

    public static function roleDesc($role)
    {
        $desc = "";

        if ($role == '0'){
            $desc = 'Superadmin';
        }else if ($role == '1'){
            $desc = 'Admin';
        }else if ($role == '2'){
            $desc = 'User';
        }else{
            $desc;
        }
        
        
        return $desc;
    }
}