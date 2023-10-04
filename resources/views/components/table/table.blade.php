@props(["column_names"])

<table class="overflow-hidden w-full text-left divide-y divide-primary-200 ring-1 ring-primary-200 rounded shadow">
    <thead class="font-semibold capitalize bg-primary-50">
        <tr>
            @foreach ($column_names as $name)
            <th class="px-4 py-2">{{ $name }}</th>
            @endforeach
            <th class="px-4 py-2">action</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-primary-200">
        {{ $slot }}
    </tbody>
</table>