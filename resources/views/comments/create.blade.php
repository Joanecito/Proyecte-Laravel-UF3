@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create new Comment') }}</div>

                    <div class="card-body"> 
                        <form method="POST" action="{{ route('comments.store', $post->id, $userid->id) }}">
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
    </div>
@endsection