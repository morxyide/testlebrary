@include('components.header')


<nav class="bg-blue-200 p-4 text-black">
    <ul class="flex space-x-4">
        <h1 class="font-bold mb-0">Manage Library</h1>
        {{-- <li><a href="{{ route('dashboard') }}" class="hover:underline" >(<< back)</a></li> --}}
    </ul>
</nav>

<div class="container mx-auto py-8">
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Resource</th>
                <th class="px-4 py-2">Count of items</th>
                <th class="px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border px-4 py-2">Books</td>
                <td class="border px-4 py-2">{{ $bookCount }}</td>
                <td class="border px-4 py-2"><a href="{{ route('books.index') }}" class="hover:underline">View</a></td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Videos</td>
                <td class="border px-4 py-2">{{ $videoCount }}</td>
                <td class="border px-4 py-2"><a href="#" class="hover:underline">View</a></td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Magazines</td>
                <td class="border px-4 py-2">{{ $magazineCount }}</td>
                <td class="border px-4 py-2"><a href="{{ route('magazines.index') }}" class="hover:underline">View</a></td>
            </tr>
            <tr>
                <td class="border px-4 py-2">CDs</td>
                <td class="border px-4 py-2">{{ $cdCount }}</td>
                <td class="border px-4 py-2"><a href="#" class="hover:underline">View</a></td>
            </tr>
        </tbody>
    </table>
</div>

