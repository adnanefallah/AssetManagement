<x-app-layout>

    <div class="flex items-center justify-between mb-8">

        <div>

            <h2 class="text-3xl font-bold text-gray-900">
                {{ __('assets.edit_title') }}
            </h2>

            <p class="text-gray-500 mt-1">
                {{ __('assets.edit_subtitle') }}
            </p>

        </div>

    </div>

    <div class="bg-white rounded-xl shadow border border-gray-200 p-8">

        <form
            action="{{ route('assets.update', $asset) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block mb-2 font-medium text-gray-700">
                        {{ __('assets.code') }}
                    </label>

                    <input
                        type="text"
                        name="asset_code"
                        value="{{ old('asset_code', $asset->asset_code) }}"
                        class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">
                </div>

                <div>
                    <label class="block mb-2 font-medium text-gray-700">
                        {{ __('assets.name') }}
                    </label>

                    <input
                        type="text"
                        name="asset_name"
                        value="{{ old('asset_name', $asset->asset_name) }}"
                        class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">
                </div>

                <div>
                    <label class="block mb-2 font-medium text-gray-700">
                        {{ __('assets.serial') }}
                    </label>

                    <input
                        type="text"
                        name="serial_number"
                        value="{{ old('serial_number', $asset->serial_number) }}"
                        class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">
                </div>

                <div>
                    <label class="block mb-2 font-medium text-gray-700">
                        {{ __('assets.category') }}
                    </label>

                    <select
                        name="category_id"
                        class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">

                        @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ $asset->category_id == $category->id ? 'selected' : '' }}>

                            {{ $category->category_name }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <div>
                    <label class="block mb-2 font-medium text-gray-700">
                        {{ __('assets.supplier') }}
                    </label>

                    <select
                        name="supplier_id"
                        class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">

                        <option value="">{{ __('assets.none') }}</option>

                        @foreach($suppliers as $supplier)

                        <option
                            value="{{ $supplier->id }}"
                            {{ $asset->supplier_id == $supplier->id ? 'selected' : '' }}>

                            {{ $supplier->company_name }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <div>
                    <label class="block mb-2 font-medium text-gray-700">
                        {{ __('assets.status') }}
                    </label>

                    <select
                        name="status"
                        class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">

                        <option value="Available" {{ $asset->status == 'Available' ? 'selected' : '' }}>
                            {{ __('assets.available') }}
                        </option>

                        <option value="Assigned" {{ $asset->status == 'Assigned' ? 'selected' : '' }}>
                            {{ __('assets.assigned') }}
                        </option>

                        <option value="Maintenance" {{ $asset->status == 'Maintenance' ? 'selected' : '' }}>
                            {{ __('assets.maintenance') }}
                        </option>

                        <option value="Retired" {{ $asset->status == 'Retired' ? 'selected' : '' }}>
                            {{ __('assets.retired') }}
                        </option>

                    </select>

                </div>

                <div>
                    <label class="block mb-2 font-medium text-gray-700">
                        {{ __('assets.purchase_date') }}
                    </label>

                    <input
                        type="date"
                        name="purchase_date"
                        value="{{ old('purchase_date', $asset->purchase_date) }}"
                        class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">
                </div>

                <div>
                    <label class="block mb-2 font-medium text-gray-700">
                        {{ __('assets.warranty_end') }}
                    </label>

                    <input
                        type="date"
                        name="warranty_end"
                        value="{{ old('warranty_end', $asset->warranty_end) }}"
                        class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">
                </div>

                <div>
                    <label class="block mb-2 font-medium text-gray-700">
                        {{ __('assets.purchase_price') }}
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="purchase_price"
                        value="{{ old('purchase_price', $asset->purchase_price) }}"
                        class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">
                </div>

                <div>
                    <label class="block mb-2 font-medium text-gray-700">
                        {{ __('assets.location') }}
                    </label>

                    <input
                        type="text"
                        name="location"
                        value="{{ old('location', $asset->location) }}"
                        class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">
                </div>

            </div>

            @if($asset->image)

            <div class="mt-8">

                <label class="block mb-3 font-medium text-gray-700">
                    {{ __('assets.current_image') }}
                </label>

                <img
                    src="{{ asset('storage/'.$asset->image) }}"
                    alt="{{ $asset->asset_name }}"
                    class="w-44 h-44 object-cover rounded-xl border border-gray-300 shadow">

            </div>

            @endif

            <div class="mt-8">

                <label class="block mb-2 font-medium text-gray-700">
                    {{ __('assets.upload_image') }}
                </label>

                <input
                    type="file"
                    name="image"
                    accept="image/*"
                    class="w-full rounded-lg border border-gray-300 p-3">

                @error('image')

                <p class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </p>

                @enderror

            </div>

            <div class="flex gap-3 mt-8">

                <button
                    type="submit"
                    class="bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition">

                    {{ __('assets.update') }}

                </button>

                <a
                    href="{{ route('assets.index') }}"
                    class="border border-gray-300 bg-white text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-100 transition">

                    {{ __('assets.cancel') }}

                </a>

            </div>

        </form>

    </div>

</x-app-layout>
