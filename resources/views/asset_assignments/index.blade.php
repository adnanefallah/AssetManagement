<x-app-layout>

    <x-slot name="header">
        <h2>Asset Assignments</h2>
    </x-slot>

    <div class="p-6">

        <a href="{{ route('asset-assignments.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded">
            + Assign Asset
        </a>

        <table class="table-auto w-full mt-5 border">

            <thead class="bg-gray-200">
            <tr>
                <th class="border px-3 py-2">Asset</th>
                <th class="border px-3 py-2">User</th>
                <th class="border px-3 py-2">Assigned Date</th>
                <th class="border px-3 py-2">Returned Date</th>
                <th class="border px-3 py-2">Status</th>
                <th class="border px-3 py-2">Actions</th>
            </tr>
            </thead>

            <tbody>

            @foreach($assignments as $assignment)

            <tr>

                <td class="border px-3 py-2">
                    {{ $assignment->asset->asset_name }}
                </td>

                <td class="border px-3 py-2">
                    {{ $assignment->user->name }}
                </td>

                <td class="border px-3 py-2">
                    {{ $assignment->assigned_date }}
                </td>

                <td class="border px-3 py-2">
                    {{ $assignment->returned_date ?? '-' }}
                </td>

                <td class="border px-3 py-2">
                    {{ $assignment->status }}
                </td>

                <td class="border px-3 py-2">

                    <a href="{{ route('asset-assignments.edit', $assignment) }}"
                       class="bg-yellow-500 text-white px-3 py-1 rounded">
                        Edit
                    </a>

                    <form action="{{ route('asset-assignments.destroy', $assignment) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button
                            class="bg-red-600 text-white px-3 py-1 rounded"
                            onclick="return confirm('Delete this assignment?')">

                            Delete

                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

            </tbody>

        </table>

        <div class="mt-5">
            {{ $assignments->links() }}
        </div>

    </div>

</x-app-layout>
