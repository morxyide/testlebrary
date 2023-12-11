@include('components.header')

<h1>Manage Library</h1>

<ul>
    <li><a href="{{ route('books.index') }}">Books</a></li>
    {{-- <li><a href="{{ route('videos.index') }}">Videos</a></li> --}}
    <li><a href="{{ route('magazines.index') }}">Magazines</a></li>
    {{-- <li><a href="{{ route('cds.index') }}">CDs</a></li> --}}
</ul>