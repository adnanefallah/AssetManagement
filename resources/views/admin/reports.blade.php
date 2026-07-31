<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Reports Dashboard
        </h2>
    </x-slot>

    <div class="p-6">

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-gray-500">Users</h3>
                <p class="text-3xl font-bold text-blue-600">
                    {{ $users }}
                </p>
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-gray-500">Departments</h3>
                <p class="text-3xl font-bold text-green-600">
                    {{ $departments }}
                </p>
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-gray-500">Categories</h3>
                <p class="text-3xl font-bold text-purple-600">
                    {{ $categories }}
                </p>
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-gray-500">Suppliers</h3>
                <p class="text-3xl font-bold text-orange-600">
                    {{ $suppliers }}
                </p>
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-gray-500">Assets</h3>
                <p class="text-3xl font-bold text-indigo-600">
                    {{ $assets }}
                </p>
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-gray-500">Assignments</h3>
                <p class="text-3xl font-bold text-cyan-600">
                    {{ $assignments }}
                </p>
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-gray-500">Tickets</h3>
                <p class="text-3xl font-bold text-red-600">
                    {{ $tickets }}
                </p>
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-gray-500">Maintenances</h3>
                <p class="text-3xl font-bold text-yellow-600">
                    {{ $maintenances }}
                </p>
            </div>

        </div>

        <!-- Asset Status Table -->
        <div class="bg-white shadow rounded-lg">

            <div class="border-b px-6 py-4">
                <h3 class="text-lg font-semibold">
                    Asset Status Summary
                </h3>
            </div>

            <table class="w-full">

                <thead class="bg-gray-100">

                <tr>

                    <th class="border px-4 py-3 text-left">
                        Status
                    </th>

                    <th class="border px-4 py-3 text-left">
                        Count
                    </th>

                </tr>

                </thead>

                <tbody>

                <tr>
                    <td class="border px-4 py-3">
                        Available
                    </td>
                    <td class="border px-4 py-3">
                        {{ $availableAssets }}
                    </td>
                </tr>

                <tr>
                    <td class="border px-4 py-3">
                        Assigned
                    </td>
                    <td class="border px-4 py-3">
                        {{ $assignedAssets }}
                    </td>
                </tr>

                <tr>
                    <td class="border px-4 py-3">
                        Maintenance
                    </td>
                    <td class="border px-4 py-3">
                        {{ $maintenanceAssets }}
                    </td>
                </tr>

                <tr>
                    <td class="border px-4 py-3">
                        Retired
                    </td>
                    <td class="border px-4 py-3">
                        {{ $retiredAssets }}
                    </td>
                </tr>

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>
