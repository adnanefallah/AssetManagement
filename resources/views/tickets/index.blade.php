<x-app-layout>

    <x-slot name="header">
        <h2>Tickets</h2>
    </x-slot>

    <div class="p-6">

        <a href="{{ route('tickets.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded">
            + Create Ticket
        </a>

        <table class="table-auto w-full mt-5 border">

            <thead class="bg-gray-200">
            <tr>
                <th class="border px-3 py-2">Title</th>
                <th class="border px-3 py-2">Asset</th>
                <th class="border px-3 py-2">User</th>
                <th class="border px-3 py-2">Priority</th>
                <th class="border px-3 py-2">Status</th>
                <th class="border px-3 py-2">Actions</th>
            </tr>
            </thead>

            <tbody>

            @foreach($tickets as $ticket)

            <tr>

                <td class="border px-3 py-2">
                    {{ $ticket->title }}
                </td>

                <td class="border px-3 py-2">
                    {{ $ticket->asset->asset_name }}
                </td>

                <td class="border px-3 py-2">
                    {{ $ticket->user->name }}
                </td>

                <td class="border px-3 py-2">
                    {{ $ticket->priority }}
                </td>

                <td class="border px-3 py-2">
                    {{ $ticket->status }}
                </td>

                <td class="border px-3 py-2">

                    <a href="{{ route('tickets.edit', $ticket) }}"
                       class="bg-yellow-500 text-white px-3 py-1 rounded">
                        Edit
                    </a>

                    <form action="{{ route('tickets.destroy', $ticket) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button
                            class="bg-red-600 text-white px-3 py-1 rounded"
                            onclick="return confirm('Delete this ticket?')">

                            Delete

                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

            </tbody>

        </table>

        <div class="mt-5">

            {{ $tickets->links() }}

        </div>

    </div>

</x-app-layout>
