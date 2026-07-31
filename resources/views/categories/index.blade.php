<x-app-layout>

    <x-slot name="header">
        <h2>Categories</h2>
    </x-slot>

    <div class="p-6">

        <a href="{{ route('categories.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded">
            + Add Category
        </a>

        <table class="table-auto w-full mt-5 border">

            <thead class="bg-gray-200">
            <tr>
                <th class="border px-3 py-2">ID</th>
                <th class="border px-3 py-2">Category Name</th>
                <th class="border px-3 py-2">Description</th>
                <th class="border px-3 py-2">Actions</th>
            </tr>
            </thead>

            <tbody>

            @foreach($categories as $category)

            <tr>

                <td class="border px-3 py-2">
                    {{ $category->id }}
                </td>

                <td class="border px-3 py-2">
                    {{ $category->category_name }}
                </td>

                <td class="border px-3 py-2">
                    {{ $category->description }}
                </td>

                <td class="border px-3 py-2">

                    <a href="{{ route('categories.edit',$category) }}"
                       class="bg-yellow-500 text-white px-3 py-1 rounded">
                        Edit
                    </a>

                    <form
                        action="{{ route('categories.destroy',$category) }}"
                        method="POST"
                        style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button
                            class="bg-red-600 text-white px-3 py-1 rounded"
                            onclick="return confirm('Delete this category?')">

                            Delete

                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

            </tbody>

        </table>

        <div class="mt-5">
            {{ $categories->links() }}
        </div>

    </div>

</x-app-layout>
