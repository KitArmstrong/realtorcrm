<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Override login function
     * @param  Request $request 
     */
    public function login(Request $request)
    {
        // Validate the form data.
        $this->validate($request, [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);
      
        $logindata = [
            'username' => $request->username,
            'password' => $request->password,
            'status' => 'A',
        ];

        // Attempt to log the user in
        if (Auth::attempt($logindata)) 
        {
            // If successful, then redirect to their intended location with fallback of home.
           return redirect()->intended(route('home'));
        } 

        // If unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('username'))->with('loginerror', 'Username or password are incorret.');;
    }
}
