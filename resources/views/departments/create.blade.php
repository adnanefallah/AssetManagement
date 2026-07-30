<x-app-layout>

    <x-slot name="header">
        <h2>Create Department</h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('departments.store') }}" method="POST">

            @csrf

            <div class="mb-4">
                <label>Department Name</label>

                <input
                    type="text"
                    name="department_name"
                    class="border w-full p-2">
            </div>

            <div class="mb-4">
                <label>Location</label>

                <input
                    type="text"
                    name="location"
                    class="border w-full p-2">
            </div>

            <div class="mb-4">
                <label>Description</label>

                <textarea
                    name="description"
                    class="border w-full p-2"></textarea>
            </div>

            <button
                class="bg-green-500 text-white px-4 py-2 rounded">
                Save
            </button>

        </form>

    </div>

</x-app-layout>
