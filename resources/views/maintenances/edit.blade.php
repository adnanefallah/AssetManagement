<x-app-layout>

    <x-slot name="header">
        <h2>Edit Maintenance</h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('maintenances.update',$maintenance) }}" method="POST">

            @csrf
            @method('PUT')

            <label>Asset</label>

            <select name="asset_id" class="border w-full p-2 rounded mb-4">

                @foreach($assets as $asset)

                <option value="{{ $asset->id }}"
                        {{ $maintenance->asset_id==$asset->id ? 'selected' : '' }}>

                    {{ $asset->asset_name }}

                </option>

                @endforeach

            </select>

            <label>Title</label>

            <input
                type="text"
                name="title"
                value="{{ $maintenance->title }}"
                class="border w-full p-2 rounded mb-4">

            <label>Description</label>

            <textarea
                name="description"
                class="border w-full p-2 rounded mb-4">{{ $maintenance->description }}</textarea>

            <label>Date</label>

            <input
                type="date"
                name="maintenance_date"
                value="{{ $maintenance->maintenance_date }}"
                class="border w-full p-2 rounded mb-4">

            <label>Cost</label>

            <input
                type="number"
                step="0.01"
                name="cost"
                value="{{ $maintenance->cost }}"
                class="border w-full p-2 rounded mb-4">

            <label>Status</label>

            <select
                name="status"
                class="border w-full p-2 rounded mb-4">

                <option {{ $maintenance->status=='Pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option {{ $maintenance->status=='In Progress' ? 'selected' : '' }}>
                    In Progress
                </option>

                <option {{ $maintenance->status=='Completed' ? 'selected' : '' }}>
                    Completed
                </option>

            </select>

            <button
                class="bg-blue-600 text-white px-4 py-2 rounded">

                Update

            </button>

        </form>

    </div>

</x-app-layout>
