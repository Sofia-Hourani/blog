@extends('layout.content')
@section('content')
 @auth
     @yield('index')
 @endauth
@endsection
