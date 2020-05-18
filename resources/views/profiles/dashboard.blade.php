<?php
$current_user_id = auth()->user()->id;
$visited_user = !empty($user) ? $user : [];
$visited_user_name = !empty($visited_user) ? $visited_user['user']['username'] : '';
$user_bio = !empty($visited_user) ? $visited_user['description'] : '';
$user_web_link = !empty($visited_user) ? $visited_user['web_link'] : '';
?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($visited_user ?? '')
            <div class="card">
                <div class="card-header">
                    Profile of {{ $visited_user_name }}
                </div>
                <div class="card-body">
                    <p>{{ $user_bio }}</p>
                    <p>{{ $user_web_link }}</p>
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
                        <li><a href="/profile/{{$current_user_id}}">My Profile</a></li>
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