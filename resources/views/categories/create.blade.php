<x-app-layout>

    <x-slot name="header">
        <h2>Create Category</h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('categories.store') }}" method="POST">

            @csrf

            <div class="mb-4">

                <label>Category Name</label>

                <input
                    type="text"
                    name="category_name"
                    class="border w-full p-2 rounded">

            </div>

            <div class="mb-4">

                <label>Description</label>

                <textarea
                    name="description"
                    class="border w-full p-2 rounded"></textarea>

            </div>

            <button
                class="bg-green-600 text-white px-4 py-2 rounded">

                Save

            </button>

            <a href="{{ route('categories.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded">

                Cancel

            </a>

        </form>

    </div>

</x-app-layout>
