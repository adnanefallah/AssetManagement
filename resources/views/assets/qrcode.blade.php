<x-app-layout>

    <div class="max-w-2xl mx-auto">

        <div class="bg-white rounded-xl shadow border border-gray-200 p-8">

            <div class="text-center">

                <h2 class="text-3xl font-bold text-gray-900">
                    {{ __('assets.qr_code') }}
                </h2>

                <p class="text-gray-500 mt-2">
                    {{ __('assets.qr_description') }}
                </p>

            </div>

            <div class="mt-8 flex justify-center">

                <div class="p-6 bg-white border rounded-xl shadow-sm">

                    {!! QrCode::size(260)->generate(
                    __('assets.code').": {$asset->asset_code}\n".
                    __('assets.name').": {$asset->asset_name}\n".
                    __('assets.serial').": {$asset->serial_number}\n".
                    __('assets.status').": ".__('assets.'.strtolower($asset->status))."\n".
                    __('assets.location').": {$asset->location}"
                    ) !!}

                </div>

            </div>

            <div class="mt-8 text-center">

                <h3 class="text-xl font-semibold">
                    {{ $asset->asset_name }}
                </h3>

                <p class="text-gray-500 mt-1">
                    {{ $asset->asset_code }}
                </p>

                <div class="mt-4 space-y-2 text-gray-700">

                    <p>
                        <strong>{{ __('assets.serial') }}:</strong>
                        {{ $asset->serial_number }}
                    </p>

                    <p>
                        <strong>{{ __('assets.status') }}:</strong>
                        {{ __('assets.'.strtolower($asset->status)) }}
                    </p>

                    <p>
                        <strong>{{ __('assets.location') }}:</strong>
                        {{ $asset->location ?: '-' }}
                    </p>

                </div>

            </div>

            <div class="mt-8 flex justify-center gap-3">

                <button
                    onclick="window.print()"
                    class="border border-gray-300 bg-white text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-100 transition">

                    {{ __('assets.print') }}

                </button>

                <a
                    href="{{ route('assets.index') }}"
                    class="bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition">

                    {{ __('assets.back_assets') }}

                </a>

            </div>

        </div>

    </div>

</x-app-layout>
