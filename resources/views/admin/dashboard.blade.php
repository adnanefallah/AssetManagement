<x-app-layout>

    <div class="mb-8">

        <h2 class="text-3xl font-bold text-gray-900">
            {{ __('admin.title') }}
        </h2>

        <p class="text-gray-500 mt-1">
            {{ __('admin.subtitle') }}
        </p>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <div class="bg-white rounded-xl shadow border border-gray-200 p-6">

            <p class="text-sm text-gray-500">
                {{ __('admin.users') }}
            </p>

            <h3 class="text-4xl font-bold mt-3">
                {{ $users }}
            </h3>

        </div>

        <div class="bg-white rounded-xl shadow border border-gray-200 p-6">

            <p class="text-sm text-gray-500">
                {{ __('admin.assets') }}
            </p>

            <h3 class="text-4xl font-bold mt-3">
                {{ $assets }}
            </h3>

        </div>

        <div class="bg-white rounded-xl shadow border border-gray-200 p-6">

            <p class="text-sm text-gray-500">
                {{ __('admin.tickets') }}
            </p>

            <h3 class="text-4xl font-bold mt-3">
                {{ $tickets }}
            </h3>

        </div>

        <div class="bg-white rounded-xl shadow border border-gray-200 p-6">

            <p class="text-sm text-gray-500">
                {{ __('admin.departments') }}
            </p>

            <h3 class="text-4xl font-bold mt-3">
                {{ $departments }}
            </h3>

        </div>

    </div>

</x-app-layout>
