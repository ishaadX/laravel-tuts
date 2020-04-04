@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Add new post</h3>

            <form method="POST" action="/post" enctype="multipart/form-data">

                @csrf

                <div class="form-group row">
                    <label for="post_title" class="col-md-3 col-form-label text-md-right">
                        {{ __('Post Title') }}
                    </label>

                    <div class="col-md-9">
                        <input id="post_title" type="text" class="form-control @error('post_title') is-invalid @enderror" name="post_title" value="{{ old('post_title') }}">

                        @error('post_title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="post_content" class="col-md-3 col-form-label text-md-right">{{ __('Post Content') }}</label>

                    <div class="col-md-9">
                        <textarea id="post_content" type="text" cols="50" rows="10" class="form-control @error('post_content') is-invalid @enderror" name="post_content" value="{{ old('post_content') }}">
                        </textarea>

                        @error('post_content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="post_thumbnail" class="col-md-3 col-form-label text-md-right">{{ __('Post Thumbnail') }}</label>

                    <div class="col-md-9">
                        <input type="file" class="form-control" id="post_thumbnail" name="post_thumbnail">

                        @error('post_thumbnail')
                        <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Add new post') }}
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection