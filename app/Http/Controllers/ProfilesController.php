<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;

class ProfilesController extends Controller
{
    /**
     * Show the user profile with or without login.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($user_id)
    {
        $user = User::findOrFail($user_id);
        return view('profiles.index', [
            'user' => $user
        ]);
    }

    public function edit($user_id)
    {
        $user = User::findOrFail($user_id);
        return view('profiles.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $update_profile = $request->validate([
            'description' => ['required', 'string'],
            'web_link' => ['required', 'url'],
        ]);
        $user_id = auth()->user()->id;
        $user = Profile::find($user_id);
        if ($user !== null) {
            auth()->user()->profile()->update([
                'description' => $update_profile['description'],
                'web_link' => $update_profile['web_link'],
            ]);
            return redirect('/user-profile/' . auth()->user()->id);
        } else {
            auth()->user()->profile()->create([
                'description' => $update_profile['description'],
                'web_link' => $update_profile['web_link'],
            ]);
            return redirect('/user-profile/' . auth()->user()->id);
        }
    }
}
