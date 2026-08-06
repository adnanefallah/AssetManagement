<x-app-layout>

    <div class="mb-8">

        <h2 class="text-3xl font-bold text-gray-900">
            {{ __('reports.title') }}
        </h2>

        <p class="text-gray-500 mt-1">
            {{ __('reports.subtitle') }}
        </p>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

        <div class="bg-white rounded-xl border border-gray-200 shadow p-6">
            <p class="text-sm text-gray-500">{{ __('reports.users') }}</p>
            <h3 class="text-4xl font-bold mt-3">{{ $users }}</h3>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 shadow p-6">
            <p class="text-sm text-gray-500">{{ __('reports.departments') }}</p>
            <h3 class="text-4xl font-bold mt-3">{{ $departments }}</h3>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 shadow p-6">
            <p class="text-sm text-gray-500">{{ __('reports.categories') }}</p>
            <h3 class="text-4xl font-bold mt-3">{{ $categories }}</h3>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 shadow p-6">
            <p class="text-sm text-gray-500">{{ __('reports.suppliers') }}</p>
            <h3 class="text-4xl font-bold mt-3">{{ $suppliers }}</h3>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 shadow p-6">
            <p class="text-sm text-gray-500">{{ __('reports.assets') }}</p>
            <h3 class="text-4xl font-bold mt-3">{{ $assets }}</h3>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 shadow p-6">
            <p class="text-sm text-gray-500">{{ __('reports.assignments') }}</p>
            <h3 class="text-4xl font-bold mt-3">{{ $assignments }}</h3>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 shadow p-6">
            <p class="text-sm text-gray-500">{{ __('reports.tickets') }}</p>
            <h3 class="text-4xl font-bold mt-3">{{ $tickets }}</h3>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 shadow p-6">
            <p class="text-sm text-gray-500">{{ __('reports.maintenances') }}</p>
            <h3 class="text-4xl font-bold mt-3">{{ $maintenances }}</h3>
        </div>

    </div>

    <div class="bg-white rounded-xl border border-gray-200 shadow overflow-hidden">

        <div class="px-6 py-4 border-b">

            <h3 class="text-xl font-semibold">
                {{ __('reports.asset_status_summary') }}
            </h3>

        </div>

        <table class="w-full">

            <thead class="bg-gray-100">

            <tr>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('reports.status') }}
                </th>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('reports.count') }}
                </th>

            </tr>

            </thead>

            <tbody>

            <tr class="border-t hover:bg-gray-50">
                <td class="px-6 py-4">{{ __('reports.available') }}</td>
                <td class="px-6 py-4">{{ $availableAssets }}</td>
            </tr>

            <tr class="border-t hover:bg-gray-50">
                <td class="px-6 py-4">{{ __('reports.assigned') }}</td>
                <td class="px-6 py-4">{{ $assignedAssets }}</td>
            </tr>

            <tr class="border-t hover:bg-gray-50">
                <td class="px-6 py-4">{{ __('reports.maintenance') }}</td>
                <td class="px-6 py-4">{{ $maintenanceAssets }}</td>
            </tr>

            <tr class="border-t hover:bg-gray-50">
                <td class="px-6 py-4">{{ __('reports.retired') }}</td>
                <td class="px-6 py-4">{{ $retiredAssets }}</td>
            </tr>

            </tbody>

        </table>

    </div>

</x-app-layout>
