@extends('layout.content')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            @if(session('success'))
                <div class="alert alert-success col-12">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger col-12">{{ session('error') }}</div>
            @endif
            <h1 class="text-center mb-4">All Posts</h1>
            @foreach ($posts as $post)
                <div class="col-md-8 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $post->title }}</h4>
                            <p class="card-text">{{ Str::limit($post->content, 3000) }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>


                            <div class="mt-3">
                                <h4>Comments</h4>
                                @if ($post->comments->count())
                                    @foreach ($post->comments as $comment)
                                        <div class="comment mb-2">
                                            <p>{{ $comment->content }}</p>
                                            <small>By {{ $comment->user->name }} at {{ $comment->created_at->format('M d, Y H:i') }}</small>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No comments yet.</p>
                                @endif

                                @auth
                                    <form method="POST" action="{{ route('comment.store', $post->id) }}">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <textarea name="content" class="form-control" placeholder="Add a comment..." ></textarea>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>

                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
