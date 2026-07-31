<x-app-layout>

    <x-slot name="header">
        <h2>Assign Asset</h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('asset-assignments.store') }}" method="POST">

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
                <label>Assigned Date</label>
                <input type="date"
                       name="assigned_date"
                       class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">

                <label>Status</label>

                <select name="status"
                        class="border w-full p-2 rounded">

                    <option>Assigned</option>
                    <option>Returned</option>

                </select>

            </div>

            <button class="bg-green-600 text-white px-4 py-2 rounded">
                Save
            </button>

            <a href="{{ route('asset-assignments.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded">

                Cancel

            </a>

        </form>

    </div>

</x-app-layout>
