<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold">Users</h3>
                    <p class="text-3xl">{{ $users }}</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold">Assets</h3>
                    <p class="text-3xl">{{ $assets }}</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold">Tickets</h3>
                    <p class="text-3xl">{{ $tickets }}</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-bold">Departments</h3>
                    <p class="text-3xl">{{ $departments }}</p>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
