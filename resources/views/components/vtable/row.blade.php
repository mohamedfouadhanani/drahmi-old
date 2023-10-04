@props(["column_name"])

<tr class="capitalize">
    <x-table.data class="text-primary-500 bg-primary-50 border-r border-primary-200">
        {{ $column_name }}
    </x-table.data>
    <x-table.data class="font-light flex items-center space-x-2">
        {{ $slot }}
    </x-table.data>
</tr>