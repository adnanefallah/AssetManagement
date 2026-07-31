<x-app-layout>

    <x-slot name="header">
        <h2>Create Maintenance</h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('maintenances.store') }}" method="POST">

            @csrf

            <label>Asset</label>

            <select name="asset_id" class="border w-full p-2 rounded mb-4">

                @foreach($assets as $asset)

                <option value="{{ $asset->id }}">
                    {{ $asset->asset_name }}
                </option>

                @endforeach

            </select>

            <label>Title</label>

            <input
                type="text"
                name="title"
                class="border w-full p-2 rounded mb-4">

            <label>Description</label>

            <textarea
                name="description"
                class="border w-full p-2 rounded mb-4"></textarea>

            <label>Date</label>

            <input
                type="date"
                name="maintenance_date"
                class="border w-full p-2 rounded mb-4">

            <label>Cost</label>

            <input
                type="number"
                step="0.01"
                name="cost"
                class="border w-full p-2 rounded mb-4">

            <label>Status</label>

            <select
                name="status"
                class="border w-full p-2 rounded mb-4">

                <option>Pending</option>
                <option>In Progress</option>
                <option>Completed</option>

            </select>

            <button
                class="bg-green-600 text-white px-4 py-2 rounded">

                Save

            </button>

        </form>

    </div>

</x-app-layout>
