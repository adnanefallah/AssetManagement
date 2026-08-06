<x-app-layout>

    <div class="max-w-4xl mx-auto">

        <div class="mb-8">

            <h2 class="text-3xl font-bold text-gray-900">
                {{ __('assets.edit_assignment') }}
            </h2>

            <p class="text-gray-500 mt-1">
                {{ __('assets.edit_assignment_description') }}
            </p>

        </div>

        <div class="bg-white rounded-xl shadow border border-gray-200 p-8">

            <form action="{{ route('asset-assignments.update', $assetAssignment) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('assets.asset') }}
                        </label>

                        <select
                            name="asset_id"
                            class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">

                            @foreach($assets as $asset)

                            <option
                                value="{{ $asset->id }}"
                                {{ $assetAssignment->asset_id == $asset->id ? 'selected' : '' }}>

                                {{ $asset->asset_name }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('assets.user') }}
                        </label>

                        <select
                            name="user_id"
                            class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">

                            @foreach($users as $user)

                            <option
                                value="{{ $user->id }}"
                                {{ $assetAssignment->user_id == $user->id ? 'selected' : '' }}>

                                {{ $user->name }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('assets.assigned_date') }}
                        </label>

                        <input
                            type="date"
                            name="assigned_date"
                            value="{{ old('assigned_date', $assetAssignment->assigned_date) }}"
                            class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">

                    </div>

                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('assets.returned_date') }}
                        </label>

                        <input
                            type="date"
                            name="returned_date"
                            value="{{ old('returned_date', $assetAssignment->returned_date) }}"
                            class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">

                    </div>

                    <div class="md:col-span-2">

                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('assets.status') }}
                        </label>

                        <select
                            name="status"
                            class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">

                            <option {{ $assetAssignment->status == 'Assigned' ? 'selected' : '' }}>
                                {{ __('assets.assigned') }}
                            </option>

                            <option {{ $assetAssignment->status == 'Returned' ? 'selected' : '' }}>
                                {{ __('assets.returned') }}
                            </option>

                        </select>

                    </div>

                </div>

                <div class="flex gap-3 mt-8">

                    <button
                        type="submit"
                        class="bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition">

                        {{ __('assets.update_assignment') }}

                    </button>

                    <a
                        href="{{ route('asset-assignments.index') }}"
                        class="border border-gray-300 bg-white text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-100 transition">

                        {{ __('assets.cancel') }}

                    </a>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>
