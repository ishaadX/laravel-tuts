@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    You are logged in!
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Profile</div>
                <div class="card-body">
                    <ul>
                        <li><a href="/user-profile/{{auth()->user()->id}}">My Profile</a></li>
                        <li><a href="/user-profile/{{auth()->user()->id}}/edit">Edit Profile</a></li>
                        <li><a href="/post/create">Add new post</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection