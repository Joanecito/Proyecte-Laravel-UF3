@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ $post->title }}</h3>
                    </div>

                    <div class="card-body">
                        {{ $post->content }}
                    </div>
                    @if (Auth::user()->id == $post->user_id or Auth::user()->hasRole('admin'))
                        <div class="card-body">
                            <form action="{{ route('posts.destroy', $post->id) }}" method="DELETE">
                                
                                <a class="btn btn-info"
                                    href="{{ route('posts.edit', [$post->id]) }}">Edit
                                    Post</a>
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete Post</button>
                            </form>
                        </div>
                    @endif
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        <h4>Comments</h4>
                    </div>
                    <div class="card-body">
                    @foreach ($comments as $comment)
                    @foreach ($users as $user)
                    @if ($comment->user_id == $user->id)
                            <p>User {{ $user->username }} says: {{ $comment->comment }} </p>
                            @endif
                        @endforeach
                        @endforeach
                        <form method="POST" action="{{ route('comments.store', $post->id) }}">
                            @csrf

                            <label for="comment" class="form-label">Comment</label>
                            <div class="mb-3">
                                <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('posts') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection