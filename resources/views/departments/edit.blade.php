<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Department
        </h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('departments.update', $department) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-2">Department Name</label>

                <input
                    type="text"
                    name="department_name"
                    value="{{ old('department_name', $department->department_name) }}"
                    class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block mb-2">Location</label>

                <input
                    type="text"
                    name="location"
                    value="{{ old('location', $department->location) }}"
                    class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block mb-2">Description</label>

                <textarea
                    name="description"
                    class="border w-full p-2 rounded"
                    rows="4">{{ old('description', $department->description) }}</textarea>
            </div>

            <button
                type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded">
                Update
            </button>

            <a href="{{ route('departments.index') }}"
               class="ml-2 bg-gray-500 text-white px-4 py-2 rounded">
                Cancel
            </a>

        </form>

    </div>

</x-app-layout>
