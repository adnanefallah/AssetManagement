<x-app-layout>

    <x-slot name="header">
        <h2>Maintenance</h2>
    </x-slot>

    <div class="p-6">

        <a href="{{ route('maintenances.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded">
            + Add Maintenance
        </a>

        <table class="table-auto w-full mt-5 border">

            <thead class="bg-gray-200">

            <tr>
                <th class="border px-3 py-2">Asset</th>
                <th class="border px-3 py-2">Title</th>
                <th class="border px-3 py-2">Date</th>
                <th class="border px-3 py-2">Cost</th>
                <th class="border px-3 py-2">Status</th>
                <th class="border px-3 py-2">Actions</th>
            </tr>

            </thead>

            <tbody>

            @foreach($maintenances as $maintenance)

            <tr>

                <td class="border px-3 py-2">
                    {{ $maintenance->asset->asset_name }}
                </td>

                <td class="border px-3 py-2">
                    {{ $maintenance->title }}
                </td>

                <td class="border px-3 py-2">
                    {{ $maintenance->maintenance_date }}
                </td>

                <td class="border px-3 py-2">
                    {{ $maintenance->cost }}
                </td>

                <td class="border px-3 py-2">
                    {{ $maintenance->status }}
                </td>

                <td class="border px-3 py-2">

                    <a href="{{ route('maintenances.edit',$maintenance) }}"
                       class="bg-yellow-500 text-white px-3 py-1 rounded">
                        Edit
                    </a>

                    <form action="{{ route('maintenances.destroy',$maintenance) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button
                            class="bg-red-500 text-white px-3 py-1 rounded"
                            onclick="return confirm('Delete maintenance?')">

                            Delete

                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

            </tbody>

        </table>

        <div class="mt-5">

            {{ $maintenances->links() }}

        </div>

    </div>

</x-app-layout>
