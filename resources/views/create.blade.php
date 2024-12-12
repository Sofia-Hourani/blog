@extends('layout.content')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
    <h1>Create a New Post</h1>
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="form-group mt-lg-4">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" required>
            </div>

            <div class="form-group mt-lg-4">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" id="content" >{{ old('content') }}</textarea>
            </div>

            <button type="submit" class="btn btn-success mt-lg-3">Create Post</button>
        </form>
    </div>
    </div>
@endsection
