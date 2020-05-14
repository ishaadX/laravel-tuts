<?php
$current_user_id = auth()->user()->id;
?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($user ?? '')
            <div class="card">
                <div class="card-header">
                    Profile of {{ $user->username }}
                </div>
                <div class="card-body">
                    @foreach($user->posts as $post)
                    <div class="post-area">
                        <div class="post-title-area">
                            <a href="/post/{{$post->id}}">
                                {{ $post->post_title }}
                            </a>
                            <span> Written by : {{$post->user->username}} </span>
                        </div>
                        <div class="post-content-area">
                            <img src="/storage/{{ $post->post_thumbnail }}" alt="img">
                            {{ $post->post_content }}
                        </div>
                    </div>
                    <hr />
                    @endforeach
                </div>
            </div>
            @endif
        </div>
        @if (!Auth::guest())
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Profile</div>
                <div class="card-body">
                    <ul>
                        <li><a href="/user-profile/{{$current_user_id}}">My Profile</a></li>
                        <li><a href="/user-profile/{{$current_user_id}}/edit">Edit Profile</a></li>
                        <li><a href="/post/create">Add new post</a></li>
                    </ul>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection