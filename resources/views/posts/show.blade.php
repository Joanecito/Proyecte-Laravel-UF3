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
                            {{$comment->id}}
                        @endforeach
                    </div>
                    <?php var_dump($comments) ?>
                </div>
            </div>
        </div>
    </div>
@endsection