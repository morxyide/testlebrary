@include('components.header')

<ul>
    <li><a href="{{ route('dashboard') }}">Home</a></li>
    <li><a href="{{ route('library.index') }}">Manage Library</a></li>
    <li><a href="{{ route('users.index') }}">Manage Users</a></li>
</ul>