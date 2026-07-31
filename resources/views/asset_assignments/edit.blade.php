<x-app-layout>

    <x-slot name="header">
        <h2>Edit Assignment</h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('asset-assignments.update', $assetAssignment) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">

                <label>Asset</label>

                <select name="asset_id" class="border w-full p-2 rounded">

                    @foreach($assets as $asset)

                    <option value="{{ $asset->id }}"
                            {{ $assetAssignment->asset_id == $asset->id ? 'selected' : '' }}>

                        {{ $asset->asset_name }}

                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-4">

                <label>User</label>

                <select name="user_id" class="border w-full p-2 rounded">

                    @foreach($users as $user)

                    <option value="{{ $user->id }}"
                            {{ $assetAssignment->user_id == $user->id ? 'selected' : '' }}>

                        {{ $user->name }}

                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-4">
                <label>Assigned Date</label>
                <input type="date"
                       name="assigned_date"
                       value="{{ old('assigned_date', $assetAssignment->assigned_date) }}"
                       class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">
                <label>Returned Date</label>
                <input type="date"
                       name="returned_date"
                       value="{{ old('returned_date', $assetAssignment->returned_date) }}"
                       class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">

                <label>Status</label>

                <select name="status"
                        class="border w-full p-2 rounded">

                    <option {{ $assetAssignment->status == 'Assigned' ? 'selected' : '' }}>
                        Assigned
                    </option>

                    <option {{ $assetAssignment->status == 'Returned' ? 'selected' : '' }}>
                        Returned
                    </option>

                </select>

            </div>

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Update
            </button>

            <a href="{{ route('asset-assignments.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded">

                Cancel

            </a>

        </form>

    </div>

</x-app-layout>
