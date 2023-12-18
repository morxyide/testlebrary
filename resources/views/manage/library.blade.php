@include('components.header')


<nav class="bg-blue-200 p-4 text-black">
    <ul class="flex space-x-4">
        <h1 class="font-bold mb-0">Manage Library</h1>
        <li><a href="{{ route('user.dashboard') }}" class="hover:underline" >(<< back)</a></li>
        <li><a href="{{ route('books.index') }}" class="hover:underline" >Books</a></li>
        <li><a href="#" class="hover:underline" >Videos</a></li>
        <li><a href="{{ route('magazines.index') }}" class="hover:underline" >Magazines</a></li>
        <li><a href="#" class="hover:underline">CDs</a></li>
    </ul>
</nav>

