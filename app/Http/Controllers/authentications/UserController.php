<?php

namespace App\Http\Controllers\authentications;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.authentications.auth-register-basic');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);
        $user->setPasswordAttribute($request->password);
        $user->save();

        Auth::login($user);

        return response()->json('Created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('content.pages.pages-account-settings-account');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
