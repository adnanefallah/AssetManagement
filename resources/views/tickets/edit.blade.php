<x-app-layout>

    <div class="max-w-4xl mx-auto">

        <div class="mb-8">

            <h2 class="text-3xl font-bold text-gray-900">
                {{ __('tickets.edit_ticket') }}
            </h2>

            <p class="text-gray-500 mt-1">
                {{ __('tickets.edit_ticket_description') }}
            </p>

        </div>

        <div class="bg-white rounded-xl shadow border border-gray-200 p-8">

            <form action="{{ route('tickets.update', $ticket) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('tickets.asset') }}
                        </label>

                        <select
                            name="asset_id"
                            class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">

                            @foreach($assets as $asset)

                            <option
                                value="{{ $asset->id }}"
                                {{ $ticket->asset_id == $asset->id ? 'selected' : '' }}>

                                {{ $asset->asset_name }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('tickets.user') }}
                        </label>

                        <select
                            name="user_id"
                            class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">

                            @foreach($users as $user)

                            <option
                                value="{{ $user->id }}"
                                {{ $ticket->user_id == $user->id ? 'selected' : '' }}>

                                {{ $user->name }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('tickets.title_label') }}
                        </label>

                        <input
                            type="text"
                            name="title"
                            value="{{ old('title', $ticket->title) }}"
                            class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">

                    </div>

                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('tickets.priority') }}
                        </label>

                        <select
                            name="priority"
                            class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">

                            <option {{ $ticket->priority == __('tickets.low') ? 'selected' : '' }}>
                                {{ __('tickets.low') }}
                            </option>

                            <option {{ $ticket->priority == __('tickets.medium') ? 'selected' : '' }}>
                                {{ __('tickets.medium') }}
                            </option>

                            <option {{ $ticket->priority == __('tickets.high') ? 'selected' : '' }}>
                                {{ __('tickets.high') }}
                            </option>

                        </select>

                    </div>

                    <div class="md:col-span-2">

                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('tickets.status') }}
                        </label>

                        <select
                            name="status"
                            class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">

                            <option {{ $ticket->status == __('tickets.open') ? 'selected' : '' }}>
                                {{ __('tickets.open') }}
                            </option>

                            <option {{ $ticket->status == __('tickets.in_progress') ? 'selected' : '' }}>
                                {{ __('tickets.in_progress') }}
                            </option>

                            <option {{ $ticket->status == __('tickets.closed') ? 'selected' : '' }}>
                                {{ __('tickets.closed') }}
                            </option>

                        </select>

                    </div>

                </div>

                <div class="mt-6">

                    <label class="block mb-2 font-medium text-gray-700">
                        {{ __('tickets.description') }}
                    </label>

                    <textarea
                        name="description"
                        rows="4"
                        class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">{{ old('description', $ticket->description) }}</textarea>

                </div>

                <div class="flex gap-3 mt-8">

                    <button
                        type="submit"
                        class="bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition">

                        {{ __('tickets.update_ticket') }}

                    </button>

                    <a
                        href="{{ route('tickets.index') }}"
                        class="border border-gray-300 bg-white text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-100 transition">

                        {{ __('tickets.cancel') }}

                    </a>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>
