<x-app-layout>

    <x-slot name="header">
        <h2>Create Asset</h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('assets.store') }}" method="POST">

            @csrf

            <div class="mb-4">
                <label>Asset Code</label>
                <input type="text" name="asset_code" class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">
                <label>Asset Name</label>
                <input type="text" name="asset_name" class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">
                <label>Serial Number</label>
                <input type="text" name="serial_number" class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">
                <label>Category</label>

                <select name="category_id" class="border w-full p-2 rounded">

                    @foreach($categories as $category)

                    <option value="{{ $category->id }}">
                        {{ $category->category_name }}
                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-4">
                <label>Supplier</label>

                <select name="supplier_id" class="border w-full p-2 rounded">

                    <option value="">None</option>

                    @foreach($suppliers as $supplier)

                    <option value="{{ $supplier->id }}">
                        {{ $supplier->company_name }}
                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-4">
                <label>Purchase Date</label>
                <input type="date" name="purchase_date" class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">
                <label>Warranty End</label>
                <input type="date" name="warranty_end" class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">
                <label>Purchase Price</label>
                <input type="number" step="0.01" name="purchase_price" class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">

                <label>Status</label>

                <select name="status" class="border w-full p-2 rounded">

                    <option>Available</option>
                    <option>Assigned</option>
                    <option>Maintenance</option>
                    <option>Retired</option>

                </select>

            </div>

            <div class="mb-4">
                <label>Location</label>
                <input type="text" name="location" class="border w-full p-2 rounded">
            </div>

            <button class="bg-green-600 text-white px-4 py-2 rounded">
                Save
            </button>

            <a href="{{ route('assets.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded">

                Cancel

            </a>

        </form>

    </div>

</x-app-layout>
