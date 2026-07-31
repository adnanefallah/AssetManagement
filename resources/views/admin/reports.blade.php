<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold">
            Reports Dashboard
        </h2>
    </x-slot>

    <div class="p-6 grid grid-cols-2 md:grid-cols-3 gap-6">

        <div class="bg-blue-500 text-white p-6 rounded shadow">
            <h3>Total Users</h3>
            <p class="text-3xl">{{ $users }}</p>
        </div>

        <div class="bg-green-500 text-white p-6 rounded shadow">
            <h3>Total Departments</h3>
            <p class="text-3xl">{{ $departments }}</p>
        </div>

        <div class="bg-purple-500 text-white p-6 rounded shadow">
            <h3>Total Categories</h3>
            <p class="text-3xl">{{ $categories }}</p>
        </div>

        <div class="bg-yellow-500 text-white p-6 rounded shadow">
            <h3>Total Suppliers</h3>
            <p class="text-3xl">{{ $suppliers }}</p>
        </div>

        <div class="bg-red-500 text-white p-6 rounded shadow">
            <h3>Total Assets</h3>
            <p class="text-3xl">{{ $assets }}</p>
        </div>

        <div class="bg-indigo-500 text-white p-6 rounded shadow">
            <h3>Total Assignments</h3>
            <p class="text-3xl">{{ $assignments }}</p>
        </div>

        <div class="bg-emerald-500 text-white p-6 rounded shadow">
            <h3>Available Assets</h3>
            <p class="text-3xl">{{ $availableAssets }}</p>
        </div>

        <div class="bg-orange-500 text-white p-6 rounded shadow">
            <h3>Assigned Assets</h3>
            <p class="text-3xl">{{ $assignedAssets }}</p>
        </div>

        <div class="bg-gray-500 text-white p-6 rounded shadow">
            <h3>Maintenance Assets</h3>
            <p class="text-3xl">{{ $maintenanceAssets }}</p>
        </div>

        <div class="bg-black text-white p-6 rounded shadow">
            <h3>Retired Assets</h3>
            <p class="text-3xl">{{ $retiredAssets }}</p>
        </div>

    </div>

</x-app-layout>
