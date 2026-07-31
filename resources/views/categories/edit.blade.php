<x-app-layout>

    <x-slot name="header">
        <h2>Edit Category</h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('categories.update',$category) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">

                <label>Category Name</label>

                <input
                    type="text"
                    name="category_name"
                    value="{{ old('category_name',$category->category_name) }}"
                    class="border w-full p-2 rounded">

            </div>

            <div class="mb-4">

                <label>Description</label>

                <textarea
                    name="description"
                    class="border w-full p-2 rounded">{{ old('description',$category->description) }}</textarea>

            </div>

            <button
                class="bg-blue-600 text-white px-4 py-2 rounded">

                Update

            </button>

            <a href="{{ route('categories.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded">

                Cancel

            </a>

        </form>

    </div>

</x-app-layout>
