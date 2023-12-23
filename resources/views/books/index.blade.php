@include('components.header')

<!-- Display the books data in a table -->
<nav class="bg-blue-200 p-4 text-black mb-2">
    <ul class="flex space-x-4">
        <h1 class="font-bold mb-0">View Books</h1>
        <li><a href="{{ route('library.index') }}" class="hover:underline" >(<< back)</a></li>
    </ul>
</nav>

@if (Auth::user() && Auth::user()->role == 'admin')
    <div class="flex justify-center py-0">
        <a href="{{route('books.create')}}" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-black uppercase transition bg-blue-200 rounded shadow ripple hover:shadow-lg hover:bg-blue-400 focus:outline-none">
            Create a book
        </a>
    </div>
@endif


<!-- Check if the books collection is empty or not -->
@if ($books->isEmpty())
    <p>There are no books in the library.</p>
@else

    <div class="rounded overflow-hidden shadow bg-blue-400 my-2 mx-2">
        <table class="w-full text-xs">
            <thead>
            <tr class="text-left font-bold bg-blue-400">
                {{-- <th class="px-2 py-3">ID</th> --}}
                <th class="px-2 py-3 break-words">Title</th>
                <th class="px-2 py-3">Author</th>
                <th class="px-2 py-3">Publisher</th>
                <th class="px-2 py-3">ISBN</th>
                <th class="px-2 py-3">Edition</th>
                <th class="px-2 py-3">Year</th>
                <th class="px-2 py-3">Category</th>
                <th class="px-2 py-3 break-words">Description</th>
                <th class="px-2 py-3">Quantity</th>
                <th class="px-2 py-3">Action</th>
            </tr>
            </thead>
            <tbody class= "divide-y divide-gray-100 bg-blue-100">
            @foreach ($books as $book)
                <tr>
                    {{-- <td class="px-2 py-3">{{ $book->id }}</td> --}}
                    <td class="px-2 py-3 break-words">{{ $book->title }}</td>
                    <td class="px-2 py-3">{{ $book->author }}</td>
                    <td class="px-2 py-3">{{ $book->publisher }}</td>
                    <td class="px-2 py-3">{{ $book->isbn }}</td>
                    <td class="px-2 py-3">{{ $book->edition }}</td>
                    <td class="px-2 py-3">{{ $book->year_published }}</td>
                    <td class="px-2 py-3">{{ $book->category }}</td>
                    <td class="px-2 py-3 break-words">{{ $book->description }}</td>
                    <td class="px-2 py-3">{{ $book->quantity }}</td>
                    <td class="px-2 py-3">
                        <form action="{{ route('books.edit', $book) }}" method="get" class="mb-2">
                            <button type="submit" class="w-full bg-blue-300 hover:bg-blue-400 text-black font-bold py-2 px-4 rounded-lg">Edit</button>
                        </form>
                        <form action="{{ route('books.destroy', $book) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-blue-300 hover:bg-blue-400 text-black font-bold py-2 px-4 rounded-lg">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif

