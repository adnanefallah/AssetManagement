<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Assets
        </h2>
    </x-slot>

    <div class="p-6">

        @if(session('success'))
        <div class="mb-4 rounded bg-green-100 border border-green-400 px-4 py-3 text-green-700">
            {{ session('success') }}
        </div>
        @endif

        <div class="flex justify-between items-center mb-6">

            <a href="{{ route('assets.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                + Add Asset
            </a>

            <div class="flex gap-2">

                <a href="{{ route('assets.pdf') }}"
                   class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                    Export PDF
                </a>

                <a href="{{ route('assets.excel') }}"
                   class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                    Export Excel
                </a>

            </div>

        </div>

        <!-- Search & Filters -->
        <form action="{{ route('assets.index') }}" method="GET" class="mb-6">

            <div class="grid grid-cols-1 md:grid-cols-5 gap-3">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search by name, code or serial number..."
                    class="border rounded px-4 py-2 w-full">

                <select
                    name="category"
                    class="border rounded px-4 py-2">

                    <option value="">All Categories</option>

                    @foreach($categories as $category)

                    <option
                        value="{{ $category->id }}"
                        {{ request('category') == $category->id ? 'selected' : '' }}>

                    {{ $category->category_name }}

                    </option>

                    @endforeach

                </select>

                <select
                    name="supplier"
                    class="border rounded px-4 py-2">

                    <option value="">All Suppliers</option>

                    @foreach($suppliers as $supplier)

                    <option
                        value="{{ $supplier->id }}"
                        {{ request('supplier') == $supplier->id ? 'selected' : '' }}>

                    {{ $supplier->company_name }}

                    </option>

                    @endforeach

                </select>

                <select
                    name="status"
                    class="border rounded px-4 py-2">

                    <option value="">All Status</option>

                    <option value="Available" {{ request('status') == 'Available' ? 'selected' : '' }}>
                    Available
                    </option>

                    <option value="Assigned" {{ request('status') == 'Assigned' ? 'selected' : '' }}>
                    Assigned
                    </option>

                    <option value="Maintenance" {{ request('status') == 'Maintenance' ? 'selected' : '' }}>
                    Maintenance
                    </option>

                    <option value="Retired" {{ request('status') == 'Retired' ? 'selected' : '' }}>
                    Retired
                    </option>

                </select>

                <div class="flex gap-2">

                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">

                        Filter

                    </button>

                    <a
                        href="{{ route('assets.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">

                        Reset

                    </a>

                </div>

            </div>

        </form>

        <table class="w-full border border-gray-300">

            <thead class="bg-gray-200">

            <tr>

                <th class="border px-3 py-2">Code</th>
                <th class="border px-3 py-2">Name</th>
                <th class="border px-3 py-2">Serial Number</th>
                <th class="border px-3 py-2">Category</th>
                <th class="border px-3 py-2">Supplier</th>
                <th class="border px-3 py-2">Status</th>
                <th class="border px-3 py-2">Location</th>
                <th class="border px-3 py-2">Actions</th>

            </tr>

            </thead>

            <tbody>

            @forelse($assets as $asset)

            <tr>

                <td class="border px-3 py-2">
                    {{ $asset->asset_code }}
                </td>

                <td class="border px-3 py-2">
                    {{ $asset->asset_name }}
                </td>

                <td class="border px-3 py-2">
                    {{ $asset->serial_number }}
                </td>

                <td class="border px-3 py-2">
                    {{ $asset->category?->category_name ?? '-' }}
                </td>

                <td class="border px-3 py-2">
                    {{ $asset->supplier?->company_name ?? '-' }}
                </td>

                <td class="border px-3 py-2">

                    @if($asset->status == 'Available')
                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded">
                                    {{ $asset->status }}
                                </span>
                    @elseif($asset->status == 'Assigned')
                    <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded">
                                    {{ $asset->status }}
                                </span>
                    @elseif($asset->status == 'Maintenance')
                    <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded">
                                    {{ $asset->status }}
                                </span>
                    @else
                    <span class="bg-red-100 text-red-700 px-2 py-1 rounded">
                                    {{ $asset->status }}
                                </span>
                    @endif

                </td>

                <td class="border px-3 py-2">
                    {{ $asset->location }}
                </td>

                <td class="border px-3 py-2">

                    <a
                        href="{{ route('assets.edit', $asset) }}"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">

                        Edit

                    </a>

                    <form
                        action="{{ route('assets.destroy', $asset) }}"
                        method="POST"
                        class="inline">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            onclick="return confirm('Delete this asset?')"
                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">

                            Delete

                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="8" class="text-center py-6 text-gray-500">

                    No assets found.

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

        <div class="mt-6">

            {{ $assets->withQueryString()->links() }}

        </div>

    </div>

</x-app-layout>
