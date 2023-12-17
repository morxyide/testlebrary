@extends('auth.layouts')
@section('content')
    <h1> Admin Dashboard</h1>
    <ul>
        <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li><a href="{{ route('library.index') }}">Manage Library</a></li>
        <li><a href="{{ route('users.index') }}">Manage Users</a></li>
    </ul>`
@endsection
