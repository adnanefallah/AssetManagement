<x-app-layout>

    <div class="flex items-center justify-between mb-8">

        <div>

            <h2 class="text-3xl font-bold text-gray-900">
                {{ __('maintenances.title') }}
            </h2>

            <p class="text-gray-500 mt-1">
                {{ __('maintenances.subtitle') }}
            </p>

        </div>

        <a
            href="{{ route('maintenances.create') }}"
            class="bg-black text-white px-5 py-2.5 rounded-lg hover:bg-gray-800 transition">

            + {{ __('maintenances.add_maintenance') }}

        </a>

    </div>

    <div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

            <tr>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('maintenances.asset') }}
                </th>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('maintenances.title_label') }}
                </th>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('maintenances.date') }}
                </th>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('maintenances.cost') }}
                </th>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('maintenances.status') }}
                </th>

                <th class="px-6 py-4 text-center font-semibold">
                    {{ __('maintenances.actions') }}
                </th>

            </tr>

            </thead>

            <tbody>

            @forelse($maintenances as $maintenance)

            <tr class="border-t hover:bg-gray-50">

                <td class="px-6 py-4 font-medium">
                    {{ $maintenance->asset->asset_name }}
                </td>

                <td class="px-6 py-4">
                    {{ $maintenance->title }}
                </td>

                <td class="px-6 py-4">
                    {{ $maintenance->maintenance_date }}
                </td>

                <td class="px-6 py-4">
                    {{ number_format($maintenance->cost, 2) }}
                </td>

                <td class="px-6 py-4">

                        <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-sm font-medium text-gray-700">
                            {{ $maintenance->status }}
                        </span>

                </td>

                <td class="px-6 py-4">

                    <div class="flex justify-center gap-2">

                        <a
                            href="{{ route('maintenances.edit', $maintenance) }}"
                            class="border border-gray-300 bg-white text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-100 transition">

                            {{ __('maintenances.edit') }}

                        </a>

                        <form
                            action="{{ route('maintenances.destroy', $maintenance) }}"
                            method="POST"
                            onsubmit="return confirm('{{ __('maintenances.delete_confirm') }}')">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">

                                {{ __('maintenances.delete') }}

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6" class="px-6 py-10 text-center text-gray-500">

                    {{ __('maintenances.no_records') }}

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-6">

        {{ $maintenances->links() }}

    </div>

</x-app-layout>
