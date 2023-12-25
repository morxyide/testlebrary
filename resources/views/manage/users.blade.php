@include('components.header')

<nav class="bg-blue-200 p-4 text-black">
    <ul class="flex space-x-4">
        <h1 class="font-bold mb-0">Manage Users</h1>
    </ul>
</nav>

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
