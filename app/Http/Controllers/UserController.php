<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Returns logged in user's name.
     *
     * @return JSON response
     */
    public function getLoggedInUser()
    {
        $user = array(
            'firstname' => Auth::user()->firstname,
            'lastname' => Auth::user()->lastname
        );

        return response()->json($user);
    }
}
