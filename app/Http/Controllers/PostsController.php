<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;


class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /** 
     * Create post function
     * 
     */
    public function create()
    {
        return view('posts.create');
    }


    /** 
     * Store post function
     * 
     */
    public function store(Request $request)
    {
        $addPostData = $request->validate([
            'post_title' => ['required', 'string'],
            'post_content' => ['required'],
            'post_thumbnail' => ['required', 'image'],
        ]);

        $post_thumbnail_path = request('post_thumbnail')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$post_thumbnail_path}"))->fit('500', '500');
        $image->save();

        auth()->user()->posts()->create([
            'post_title' => $addPostData['post_title'],
            'post_content' => $addPostData['post_content'],
            'post_thumbnail' => $post_thumbnail_path,
        ]);
        return redirect('/user-profile/' . auth()->user()->id);
    }

    /** 
     * Display post function
     * 
     */
    public function show($post)
    {
        return view('posts.show', [
            'post' => Posts::findOrFail($post)
        ]);
    }

    public function destroy($post)
    {
        $user_id = auth()->user()->id;
        $delete_post_id = Posts::where('id', $post)->where('user_id', $user_id)->get();
        $delete_post_id->delete();
        return redirect('/user-profile/' . auth()->user()->id);
    }
}
