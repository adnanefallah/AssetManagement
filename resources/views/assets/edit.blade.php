<x-app-layout>

    <x-slot name="header">
        <h2>Edit Asset</h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('assets.update',$asset) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">
                <label>Asset Code</label>
                <input type="text"
                       name="asset_code"
                       value="{{ old('asset_code',$asset->asset_code) }}"
                       class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">
                <label>Asset Name</label>
                <input type="text"
                       name="asset_name"
                       value="{{ old('asset_name',$asset->asset_name) }}"
                       class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">
                <label>Serial Number</label>
                <input type="text"
                       name="serial_number"
                       value="{{ old('serial_number',$asset->serial_number) }}"
                       class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">

                <label>Category</label>

                <select name="category_id" class="border w-full p-2 rounded">

                    @foreach($categories as $category)

                    <option value="{{ $category->id }}"
                            {{ $asset->category_id == $category->id ? 'selected' : '' }}>

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

                    <option value="{{ $supplier->id }}"
                            {{ $asset->supplier_id == $supplier->id ? 'selected' : '' }}>

                        {{ $supplier->company_name }}

                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-4">
                <label>Purchase Date</label>
                <input type="date"
                       name="purchase_date"
                       value="{{ old('purchase_date',$asset->purchase_date) }}"
                       class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">
                <label>Warranty End</label>
                <input type="date"
                       name="warranty_end"
                       value="{{ old('warranty_end',$asset->warranty_end) }}"
                       class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">
                <label>Purchase Price</label>
                <input type="number"
                       step="0.01"
                       name="purchase_price"
                       value="{{ old('purchase_price',$asset->purchase_price) }}"
                       class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">

                <label>Status</label>

                <select name="status" class="border w-full p-2 rounded">

                    <option {{ $asset->status=='Available' ? 'selected':'' }}>Available</option>
                    <option {{ $asset->status=='Assigned' ? 'selected':'' }}>Assigned</option>
                    <option {{ $asset->status=='Maintenance' ? 'selected':'' }}>Maintenance</option>
                    <option {{ $asset->status=='Retired' ? 'selected':'' }}>Retired</option>

                </select>

            </div>

            <div class="mb-4">
                <label>Location</label>
                <input type="text"
                       name="location"
                       value="{{ old('location',$asset->location) }}"
                       class="border w-full p-2 rounded">
            </div>

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Update
            </button>

            <a href="{{ route('assets.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded">

                Cancel

            </a>

        </form>

    </div>

</x-app-layout>
