@extends('layout.content')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
    <h1>Edit Post</h1>


            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group  mt-lg-4">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="form-control" required>
                </div>

                <div class="form-group  mt-lg-4">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="form-control" required>{{ old('content', $post->content) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary mt-lg-3">Update</button>
            </form>

        </div>
    </div>
@endsection
