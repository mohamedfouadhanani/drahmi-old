@props(["show_route", "edit_route", "delete_route"])

<x-table.data class="flex items-center space-x-2">
    <x-link href="{{ $show_route }}">show</x-link>
    <x-link href="{{ $edit_route }}">edit</x-link>
    <form action="{{ $delete_route }}" method="post">
        @csrf
        @method("DELETE")
        <input type="submit" value="delete" class="cursor-pointer capitalize text-sm text-primary-600 dark:text-gray-400 font-semibold hover:text-primary-500 dark:hover:text-gray-500 hover:underline">
    </form>
</x-table.data>