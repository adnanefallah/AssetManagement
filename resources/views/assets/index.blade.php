<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Assets
        </h2>
    </x-slot>

    <div class="p-6">

        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <div class="flex justify-between items-center mb-4">

            <a href="{{ route('assets.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                + Add Asset
            </a>

        </div>

        <!-- Search Form -->
        <form method="GET" action="{{ route('assets.index') }}" class="mb-6">

            <div class="flex gap-2">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search by name, tag or serial number..."
                    class="border rounded px-4 py-2 w-96">

                <button
                    type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Search
                </button>

                <a
                    href="{{ route('assets.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                    Reset
                </a>

            </div>

        </form>

        <table class="table-auto w-full border border-gray-300">

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
                    {{ $asset->status }}
                </td>

                <td class="border px-3 py-2">
                    {{ $asset->location }}
                </td>

                <td class="border px-3 py-2">

                    <a href="{{ route('assets.edit', $asset) }}"
                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                        Edit
                    </a>

                    <form action="{{ route('assets.destroy', $asset) }}"
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

        <div class="mt-5">

            {{ $assets->withQueryString()->links() }}

        </div>

    </div>

</x-app-layout>
