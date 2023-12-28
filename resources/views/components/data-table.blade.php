<!-- resources/views/components/data-table.blade.php -->
<div class="rounded overflow-hidden shadow my-2 mx-20">
    <table class="w-full">
        <thead>
        <tr class="text-left font-bold bg-blue-200">
            @foreach($headers as $header)
                <th class="px-2 py-3">{{ $header }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
        @foreach ($rows as $row)
            <tr>
                @foreach($row as $cell)
                    <td class="px-2 py-3">{!! $cell !!}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>