<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class loginValidator extends Controller
{
    public function loginValidation(Request $request)
    {
        $var = Validator::make($request->all(),
            [
                'email' => 'required|email|ends_with:@gmail.com',
                'password' => 'required'
            ],[
                    'email.ends_with'  => 'Domain name must end with @gmail.com'
            ]);

        return $var;

    }
}
