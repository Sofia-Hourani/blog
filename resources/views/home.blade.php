@extends('layout.content')

@section('content')
    <div class="container mt-5">
        <div class="jumbotron text-center bg-light p-5 shadow-sm rounded">
            <h1 class="display-4">Welcome to Blogs</h1>
            <p class="lead">Your platform to share and explore articles on various topics. Join us to create, learn, and connect.</p>
            <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-lg">Login</a>
        </div>
    </div>
@endsection
