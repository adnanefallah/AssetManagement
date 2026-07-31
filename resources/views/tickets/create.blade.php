<x-app-layout>

    <x-slot name="header">
        <h2>Create Ticket</h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('tickets.store') }}" method="POST">

            @csrf

            <div class="mb-4">

                <label>Asset</label>

                <select name="asset_id" class="border w-full p-2 rounded">

                    @foreach($assets as $asset)

                    <option value="{{ $asset->id }}">
                        {{ $asset->asset_name }}
                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-4">

                <label>User</label>

                <select name="user_id" class="border w-full p-2 rounded">

                    @foreach($users as $user)

                    <option value="{{ $user->id }}">
                        {{ $user->name }}
                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-4">
                <label>Title</label>
                <input type="text"
                       name="title"
                       class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">
                <label>Description</label>
                <textarea name="description"
                          class="border w-full p-2 rounded"></textarea>
            </div>

            <div class="mb-4">

                <label>Priority</label>

                <select name="priority"
                        class="border w-full p-2 rounded">

                    <option>Low</option>
                    <option selected>Medium</option>
                    <option>High</option>

                </select>

            </div>

            <div class="mb-4">

                <label>Status</label>

                <select name="status"
                        class="border w-full p-2 rounded">

                    <option selected>Open</option>
                    <option>In Progress</option>
                    <option>Closed</option>

                </select>

            </div>

            <button class="bg-green-600 text-white px-4 py-2 rounded">
                Save
            </button>

            <a href="{{ route('tickets.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded">

                Cancel

            </a>

        </form>

    </div>

</x-app-layout>
