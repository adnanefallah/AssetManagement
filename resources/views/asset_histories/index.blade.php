<x-app-layout>

    <div class="max-w-6xl mx-auto">

        <div class="flex items-center justify-between mb-8">

            <div>

                <h2 class="text-3xl font-bold text-gray-900">
                    {{ __('history.title') }}
                </h2>

                <p class="text-gray-500 mt-1">
                    {{ __('history.subtitle') }}
                </p>

            </div>

            <a
                href="{{ route('assets.index') }}"
                class="border border-gray-300 bg-white text-gray-700 px-5 py-2.5 rounded-lg hover:bg-gray-100 transition">

                {{ __('history.back_to_assets') }}

            </a>

        </div>

        <div class="bg-white rounded-xl shadow border border-gray-200 p-6 mb-6">

            <h3 class="text-2xl font-semibold text-gray-900">
                {{ $asset->asset_name }}
            </h3>

            <p class="text-gray-500 mt-2">
                {{ __('history.asset_code') }}: <span class="font-medium">{{ $asset->asset_code }}</span>
            </p>

        </div>

        <div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">

            <table class="w-full">

                <thead class="bg-gray-100">

                <tr>

                    <th class="px-6 py-4 text-left font-semibold">
                        {{ __('history.date') }}
                    </th>

                    <th class="px-6 py-4 text-left font-semibold">
                        {{ __('history.action') }}
                    </th>

                    <th class="px-6 py-4 text-left font-semibold">
                        {{ __('history.description') }}
                    </th>

                </tr>

                </thead>

                <tbody>

                @forelse($histories as $history)

                <tr class="border-t hover:bg-gray-50">

                    <td class="px-6 py-4">
                        {{ $history->created_at->format('d M Y - H:i') }}
                    </td>

                    <td class="px-6 py-4">

                            <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-sm font-medium text-gray-700">

                                {{ $history->action }}

                            </span>

                    </td>

                    <td class="px-6 py-4 text-gray-700">
                        {{ $history->description }}
                    </td>

                </tr>

                @empty

                <tr>

                    <td
                        colspan="3"
                        class="px-6 py-10 text-center text-gray-500">

                        {{ __('history.no_history') }}

                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>
