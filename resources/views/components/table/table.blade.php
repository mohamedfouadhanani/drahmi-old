@props(["column_names"])

<section class="overflow-x-auto ring-1 ring-primary-200 dark:ring-gray-800 rounded shadow">
    <table class="table-auto w-full text-left divide-y divide-primary-200 dark:divide-gray-800">
        <thead class="font-semibold capitalize bg-primary-50 dark:bg-gray-950">
            <tr>
                @foreach ($column_names as $name)
                <th class="px-4 py-2">{{ $name }}</th>
                @endforeach
                <th class="px-4 py-2">action</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-primary-200 dark:divide-primary-800">
            {{ $slot }}
        </tbody>
    </table>
</section>