<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    /**
     * Show the user profile with or without login.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($user)
    {
        // dd($user);
        $user = User::find($user);
        return view('profile', [
            'user' => $user
        ]);
    }
}
