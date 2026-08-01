<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Asset QR Code
        </h2>
    </x-slot>

    <div class="p-8">

        <div class="max-w-md mx-auto bg-white rounded-lg shadow p-6 text-center">

            <h2 class="text-2xl font-bold mb-2">
                {{ $asset->asset_name }}
            </h2>

            <p class="text-gray-500 mb-4">
                {{ $asset->asset_code }}
            </p>

            <div class="flex justify-center mb-6">

                {!! QrCode::size(250)->generate(
                "Asset Code: {$asset->asset_code}\n".
                "Asset Name: {$asset->asset_name}\n".
                "Serial Number: {$asset->serial_number}\n".
                "Status: {$asset->status}\n".
                "Location: {$asset->location}"
                ) !!}

            </div>

            <a href="{{ route('assets.index') }}"
               class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">

                Back

            </a>

        </div>

    </div>

</x-app-layout>
