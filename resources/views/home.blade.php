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

                    You are logged in! {{Auth::user()->username ?? 'Nobody'}}
                </div>
                <div class="card-body">
                        <a href="{{ route('posts') }}">See posts</a>
                    </div>

                    <div class="card-body">
                        <a href="{{ route('user.edit', Auth::user()->id) }}">Manage profile</a>
                    </div>
                    
                    @if (Auth::user()->role_id == 1)
                        <div class="card-body">
                            <a href="{{ route('user') }}">Manage users</a>
                        </div>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection
