@props(["back_route", "delete_route"])

<section class="overflow-x-auto ring-1 ring-primary-200 dark:ring-gray-800 rounded shadow">
    <table class="table-auto w-full text-left divide-y divide-primary-200 dark:divide-gray-800">
        <tbody class="divide-y divide-primary-200 dark:divide-gray-800">
            {{ $slot }}
            <x-vtable.row column_name="action">
                <x-link href="{{ $back_route }}">go back</x-link>
                <form action="{{ $delete_route }}" method="post">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="delete" class="cursor-pointer capitalize text-sm text-primary-600 dark:text-gray-400 font-semibold hover:text-primary-500 dark:hover:text-gray-500 hover:underline">
                </form>
            </x-vtable.row>
        </tbody>
    </table>
</section>