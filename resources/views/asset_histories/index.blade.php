<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Asset History
        </h2>
    </x-slot>

    <div class="p-6">

        <div class="bg-white rounded shadow p-6">

            <h3 class="text-lg font-bold mb-2">
                {{ $asset->asset_name }}
            </h3>

            <p class="text-gray-600 mb-6">
                Code: {{ $asset->asset_code }}
            </p>

            <table class="w-full border">

                <thead class="bg-gray-200">

                <tr>
                    <th class="border px-4 py-2">Date</th>
                    <th class="border px-4 py-2">Action</th>
                    <th class="border px-4 py-2">Description</th>
                </tr>

                </thead>

                <tbody>

                @forelse($histories as $history)

                <tr>

                    <td class="border px-4 py-2">
                        {{ $history->created_at->format('d/m/Y H:i') }}
                    </td>

                    <td class="border px-4 py-2">
                        {{ $history->action }}
                    </td>

                    <td class="border px-4 py-2">
                        {{ $history->description }}
                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="3" class="text-center py-6">
                        No history available.
                    </td>
                </tr>

                @endforelse

                </tbody>

            </table>

            <div class="mt-6">

                <a
                    href="{{ route('assets.index') }}"
                    class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">

                    Back

                </a>

            </div>

        </div>

    </div>

</x-app-layout>
