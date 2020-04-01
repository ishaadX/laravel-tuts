@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    public view of {{ $user->username }}
                </div>
                <div class="card-body">
                    This is profile for public view
                </div>
            </div>
        </div>
    </div>
</div>
@endsection