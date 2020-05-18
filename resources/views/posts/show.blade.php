<?php
$current_user_id = auth()->user()->id;
$current_post_user_id = !empty($post) ? $post->user->id  : '';
$display_delete = true;
if ($current_user_id !== $current_post_user_id) {
    $display_delete = false;
}
?>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($post ?? '')
            <div class="card pb-4">
                <div class="card-header">
                    <a href="/post/{{$post->id}}">
                        {{ $post->post_title }}
                    </a>
                    <span> Written by : {{$post->user->username}}</span>
                </div>
                <div class="card-body">
                    <img src="/storage/{{ $post->post_thumbnail }}" alt="img">
                    {{ $post->post_content }}
                </div>
            </div>
            @endif
        </div>
        @if ($display_delete != false)
        <div class="col-md-4">
            <form method="post" action="{{ route('post.destroy', [$post->id]) }}">
                {{ method_field('DELETE') }}
                {!! csrf_field() !!}
                <button type="submit">Delete</button>
            </form>
        </div>
        @endif
    </div>
</div>
@endsection