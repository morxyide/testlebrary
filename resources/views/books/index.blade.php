<!-- resources/views/index.blade.php -->

@include('components.header')

<!-- Display the books data in a table -->

<h2>Books</h2>
<a href="{{route('books.create')}}"> Create a book</a>

@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

<!-- Check if the books collection is empty or not -->
@if ($books->isEmpty())
    <p>There are no books in the library.</p>
@else
    <div>
        <table>
            <thead>
            <tr>
                <th><strong>ID</strong></th>
                <th><strong>Title</strong></th>
                <th><strong>Author</strong></th>
                <th><strong>Publisher</strong></th>
                <th><strong>ISBN</strong></th>
                <th><strong>Edition</strong></th>
                <th><strong>Year Published</strong></th>
                <th><strong>Category</strong></th>
                <th><strong>Description</strong></th>
                <th><strong>Quantity</strong></th>
                <th><strong>Action</strong></th>
            </tr>
            </thead>
            <tbody>
            <!-- Loop through the books collection and display each book's properties -->
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->publisher }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->edition }}</td>
                    <td>{{ $book->year_published }}</td>
                    <td>{{ $book->category }}</td>
                    <td>{{ $book->description }}</td>
                    <td>{{ $book->quantity }}</td>
                    <td>
                        <form action="{{ route('books.edit', $book) }}" method="get">
                            <button type="submit" class="btn btn-danger">Edit</button>
                        </form>
                        <form action="{{ route('books.destroy', $book) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif

