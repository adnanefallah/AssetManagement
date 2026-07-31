<x-app-layout>

    <x-slot name="header">
        <h2>Assets</h2>
    </x-slot>

    <div class="p-6">

        <a href="{{ route('assets.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded">
            + Add Asset
        </a>

        <table class="table-auto w-full mt-5 border">

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

            @foreach($assets as $asset)

            <tr>

                <td class="border px-3 py-2">{{ $asset->asset_code }}</td>

                <td class="border px-3 py-2">{{ $asset->asset_name }}</td>

                <td class="border px-3 py-2">{{ $asset->serial_number }}</td>

                <td class="border px-3 py-2">
                    {{ $asset->category->category_name }}
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

                    <a href="{{ route('assets.edit',$asset) }}"
                       class="bg-yellow-500 text-white px-3 py-1 rounded">
                        Edit
                    </a>

                    <form action="{{ route('assets.destroy',$asset) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button
                            class="bg-red-600 text-white px-3 py-1 rounded"
                            onclick="return confirm('Delete this asset?')">

                            Delete

                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

            </tbody>

        </table>

        <div class="mt-5">

            {{ $assets->links() }}

        </div>

    </div>

</x-app-layout>
