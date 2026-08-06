<x-app-layout>

    <div class="flex items-center justify-between mb-8">

        <div>

            <h2 class="text-3xl font-bold text-gray-900">
                {{ __('tickets.title') }}
            </h2>

            <p class="text-gray-500 mt-1">
                {{ __('tickets.subtitle') }}
            </p>

        </div>

        {{-- Administrator & User can create tickets --}}
        @if(auth()->user()->isAdmin() || auth()->user()->isUser())
        <a
            href="{{ route('tickets.create') }}"
            class="bg-black text-white px-5 py-2.5 rounded-lg hover:bg-gray-800 transition">

            + {{ __('tickets.create_ticket') }}

        </a>
        @endif

    </div>

    <div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

            <tr>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('tickets.title_label') }}
                </th>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('tickets.asset') }}
                </th>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('tickets.user') }}
                </th>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('tickets.priority') }}
                </th>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('tickets.status') }}
                </th>

                <th class="px-6 py-4 text-center font-semibold">
                    {{ __('tickets.actions') }}
                </th>

            </tr>

            </thead>

            <tbody>

            @forelse($tickets as $ticket)

            <tr class="border-t hover:bg-gray-50">

                <td class="px-6 py-4 font-medium">
                    {{ $ticket->title }}
                </td>

                <td class="px-6 py-4">
                    {{ $ticket->asset->asset_name }}
                </td>

                <td class="px-6 py-4">
                    {{ $ticket->user->name }}
                </td>

                <td class="px-6 py-4">

                        <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-sm font-medium text-gray-700">
                            {{ $ticket->priority }}
                        </span>

                </td>

                <td class="px-6 py-4">

                        <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-sm font-medium text-gray-700">
                            {{ $ticket->status }}
                        </span>

                </td>

                <td class="px-6 py-4">

                    <div class="flex justify-center gap-2">

                        {{-- Administrator --}}
                        @if(auth()->user()->isAdmin())

                        <a
                            href="{{ route('tickets.edit', $ticket) }}"
                            class="border border-gray-300 bg-white text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-100 transition">

                            {{ __('tickets.edit') }}

                        </a>

                        <form
                            action="{{ route('tickets.destroy', $ticket) }}"
                            method="POST"
                            onsubmit="return confirm('{{ __('tickets.delete_confirm') }}')">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">

                                {{ __('tickets.delete') }}

                            </button>

                        </form>

                        {{-- Technician --}}
                        @elseif(auth()->user()->isTechnician())

                        <a
                            href="{{ route('tickets.edit', $ticket) }}"
                            class="border border-gray-300 bg-white text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-100 transition">

                            {{ __('tickets.edit') }}

                        </a>

                        {{-- User --}}
                        @else

                        <span class="text-gray-400 text-sm">
                                    —
                                </span>

                        @endif

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6" class="px-6 py-10 text-center text-gray-500">

                    {{ __('tickets.no_tickets') }}

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-6">

        {{ $tickets->links() }}

    </div>

</x-app-layout>
