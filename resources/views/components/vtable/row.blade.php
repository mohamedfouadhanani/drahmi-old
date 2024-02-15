@props(["column_name"])

<tr class="capitalize">
    <x-table.data class="text-primary-500 dark:text-gray-500 bg-primary-50 dark:bg-gray-950 border-r border-primary-200 dark:border-gray-800">
        {{ $column_name }}
    </x-table.data>
    <x-table.data class="font-light flex items-center space-x-2">
        {{ $slot }}
    </x-table.data>
</tr>