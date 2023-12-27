@extends('components.header')

@section('content')
<nav class="bg-blue-200 p-4 text-black mb-2">
    <ul class="flex space-x-4">
        <h1 class="font-bold mb-0">List of Borrowed Items</h1>
    </ul>
</nav>

<div class="rounded overflow-hidden shadow my-2 mx-20">
    <table class="w-full">
        <thead>
        <tr class="text-left font-bold bg-blue-200">
            <th class="px-2 py-3">Type</th>
            <th class="px-2 py-3 break-words">Title</th>
            <th class="px-2 py-3">Borrowed At</th>
            <th class="px-2 py-3">Return By</th>
            <th class="px-2 py-3">Return</th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
        @foreach ($borrowings as $borrowing)
            <tr>
                <td class="px-2 py-3">{{ class_basename($borrowing->borrowable_type) }}</td>
                <td class="px-2 py-3 break-words">{{ $borrowing->borrowable->title }}</td>
                <td class="px-2 py-3">{{ $borrowing->borrowed_at }}</td>
                <td class="px-2 py-3">{{ $borrowing->return_by }}</td>
                <td class="px-2 py-3">
                    <form action="{{ route('user.return', $borrowing) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-green-200 hover:bg-green-400 text-black font-bold py-2 px-4 rounded-lg">✔️</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection