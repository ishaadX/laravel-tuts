@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($user ?? '')
            <div class="card">
                <div class="card-header">
                    Edit profilt : {{$user->username}}
                </div>
                <div class="card-body">
                    <form method="POST" action="/user-profile/{{$user->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="description" class="col-md-3 col-form-label text-md-right">
                                {{ __('Description') }}
                            </label>

                            <div class="col-md-9">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}">

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="web_link" class="col-md-3 col-form-label text-md-right">
                                {{ __('Profile Link') }}
                            </label>

                            <div class="col-md-9">
                                <input id="web_link" type="text" class="form-control @error('web_link') is-invalid @enderror" name="web_link" value="{{ old('web_link') }}">

                                @error('web_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('save profile') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            @endif
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