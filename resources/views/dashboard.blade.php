<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            {{ __('dashboard.title') }}
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto px-6">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-white border rounded-lg shadow-sm p-5">

                    <p class="text-sm text-gray-500">
                        {{ __('dashboard.assets') }}
                    </p>

                    <h3 class="text-3xl font-bold mt-2">
                        {{ $totalAssets }}
                    </h3>

                </div>

                <div class="bg-white border rounded-lg shadow-sm p-5">

                    <p class="text-sm text-gray-500">
                        {{ __('dashboard.assignments') }}
                    </p>

                    <h3 class="text-3xl font-bold mt-2">
                        {{ $totalAssignments }}
                    </h3>

                </div>

                <div class="bg-white border rounded-lg shadow-sm p-5">

                    <p class="text-sm text-gray-500">
                        {{ __('dashboard.tickets') }}
                    </p>

                    <h3 class="text-3xl font-bold mt-2">
                        {{ $totalTickets }}
                    </h3>

                </div>

                <div class="bg-white border rounded-lg shadow-sm p-5">

                    <p class="text-sm text-gray-500">
                        {{ __('dashboard.maintenances') }}
                    </p>

                    <h3 class="text-3xl font-bold mt-2">
                        {{ $totalMaintenances }}
                    </h3>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
