<x-app-layout>

    <x-slot name="header">
        <h2>Create Supplier</h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('suppliers.store') }}" method="POST">

            @csrf

            <div class="mb-4">
                <label>Company Name</label>
                <input type="text" name="company_name" class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">
                <label>Contact Person</label>
                <input type="text" name="contact_person" class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">
                <label>Email</label>
                <input type="email" name="email" class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">
                <label>Phone</label>
                <input type="text" name="phone" class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">
                <label>Address</label>
                <textarea name="address" class="border w-full p-2 rounded"></textarea>
            </div>

            <button class="bg-green-600 text-white px-4 py-2 rounded">
                Save
            </button>

            <a href="{{ route('suppliers.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded">
                Cancel
            </a>

        </form>

    </div>

</x-app-layout>
