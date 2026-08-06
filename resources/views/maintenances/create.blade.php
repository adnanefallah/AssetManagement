<x-app-layout>

    <div class="max-w-4xl mx-auto">

        <div class="mb-8">

            <h2 class="text-3xl font-bold text-gray-900">
                {{ __('maintenances.create_maintenance') }}
            </h2>

            <p class="text-gray-500 mt-1">
                {{ __('maintenances.create_description') }}
            </p>

        </div>


        <div class="bg-white rounded-xl shadow border border-gray-200 p-8">

            <form action="{{ route('maintenances.store') }}" method="POST">

                @csrf


                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('maintenances.asset') }}
                        </label>

                        <select
                            name="asset_id"
                            class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">

                            @foreach($assets as $asset)

                            <option value="{{ $asset->id }}">
                                {{ $asset->asset_name }}
                            </option>

                            @endforeach

                        </select>

                    </div>


                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('maintenances.title_label') }}
                        </label>

                        <input
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">

                    </div>


                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('maintenances.maintenance_date') }}
                        </label>

                        <input
                            type="date"
                            name="maintenance_date"
                            value="{{ old('maintenance_date') }}"
                            class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">

                    </div>


                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('maintenances.cost') }}
                        </label>

                        <input
                            type="number"
                            step="0.01"
                            name="cost"
                            value="{{ old('cost') }}"
                            class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">

                    </div>


                    <div class="md:col-span-2">

                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('maintenances.status') }}
                        </label>

                        <select
                            name="status"
                            class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">

                            <option>{{ __('maintenances.pending') }}</option>
                            <option>{{ __('maintenances.in_progress') }}</option>
                            <option>{{ __('maintenances.completed') }}</option>

                        </select>

                    </div>


                </div>


                <div class="mt-6">

                    <label class="block mb-2 font-medium text-gray-700">
                        {{ __('maintenances.description') }}
                    </label>

                    <textarea
                        name="description"
                        rows="4"
                        class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">{{ old('description') }}</textarea>

                </div>



                <div class="flex gap-3 mt-8">


                    <button
                        type="submit"
                        class="bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition">

                        {{ __('maintenances.save_maintenance') }}

                    </button>


                    <a
                        href="{{ route('maintenances.index') }}"
                        class="border border-gray-300 bg-white text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-100 transition">

                        {{ __('maintenances.cancel') }}

                    </a>


                </div>


            </form>

        </div>


    </div>


</x-app-layout>
