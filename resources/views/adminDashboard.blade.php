@extends('../auth.layouts')

@section('content')
    <nav class="bg-blue-200 p-4 text-black">
        <ul class="flex space-x-4">
            <h1 class="font-bold mb-0">Admin Dashboard</h1>
            <li><a href="{{ route('user.dashboard') }}" class="hover:underline">Home</a></li>
            <li><a href="{{ route('library.index') }}" class="hover:underline">Manage Library</a></li>
            <li><a href="{{ route('users.index') }}" class="hover:underline">Manage Users</a></li>
        </ul>
    </nav>
@endsection