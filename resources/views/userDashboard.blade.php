@extends('../auth.layouts')
@section('content')
    <h1> User Dashboard </h1>
    <ul>
        <li><a href="{{ route('user.dashboard') }}">Home</a></li>
        <li><a href="{{ route('library.index') }}">View Library</a></li>
        <li><a href="{{ route('users.index') }}">Due Returns</a></li>
    </ul>
@endsection
