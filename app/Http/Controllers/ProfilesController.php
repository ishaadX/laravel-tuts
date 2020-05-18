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
        $user = User::with('posts')->findOrFail($user_id);
        return view('profiles.index', [
            'user' => $user
        ]);
    }

    public function profileView($user_id)
    {
        $user_profile = Profile::with('user')->findOrFail($user_id)->toArray();
        return view('profiles.dashboard', [
            'user' => $user_profile
        ]);
    }

    public function edit($user_id)
    {
        $current_user_id = auth()->user()->id;
        $requested_user = $this->findingUser($user_id);
        if ($current_user_id == $requested_user->id) {
            return view('profiles.edit', [
                'user' => $requested_user
            ]);
        } else {
            $user = $this->findingUser($current_user_id);
            $this->authorize('update', $user->profile);
        }
    }

    public function update(Request $request)
    {
        $update_profile = $request->validate([
            'description' => ['required', 'string'],
            'web_link' => ['required', 'url'],
        ]);
        $user_id = auth()->user()->id;
        $user_profile = Profile::find($user_id);
        $user = $this->findingUser($user_id);

        if ($user_profile !== null) {
            auth()->user()->profile()->update([
                'description' => $update_profile['description'],
                'web_link' => $update_profile['web_link'],
            ]);
        } else {
            auth()->user()->profile()->create([
                'description' => $update_profile['description'],
                'web_link' => $update_profile['web_link'],
            ]);
        }
        $redirect_params = [auth()->user()->id];
        return redirect()->route('profile.dashboard', $redirect_params);
    }

    public function findingUser($userID)
    {
        return User::findOrFail($userID);
    }
}
