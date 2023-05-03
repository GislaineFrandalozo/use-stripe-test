<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    /**
     * Show the form for user login.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.authentications.auth-login-basic');
    }

    /**
     * User login
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $email = $request->email;
        $password = $request->password;

        $auth = Auth::guard('web')->attempt(['email' => $email, 'password' => $password]);
        
        if(!$auth){
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }
    }

    /**
     *  User Logout 
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Auth::logout();
    }
}
