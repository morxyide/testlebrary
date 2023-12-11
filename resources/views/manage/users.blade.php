@include('components.header')

<h2>Users: </h2>


<!-- Check if the books collection is empty or not -->
@if ($users->isEmpty())
    <p>There are no books in the library.</p>
@else
    <div>
        <table>
            <thead>
            <tr>
                <th><strong>ID</strong></th>
                <th><strong>Name</strong></th>
                <th><strong>Email</strong></th>
                <th><strong>Role</strong></th>
                <th><strong>Action</strong></th>
            </tr>
            </thead>
            <tbody>
            
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <form action="{{ route('books.destroy', $user) }}" method="post">
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
