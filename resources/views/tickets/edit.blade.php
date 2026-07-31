<x-app-layout>

    <x-slot name="header">
        <h2>Edit Ticket</h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('tickets.update', $ticket) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">

                <label>Asset</label>

                <select name="asset_id" class="border w-full p-2 rounded">

                    @foreach($assets as $asset)

                    <option value="{{ $asset->id }}"
                            {{ $ticket->asset_id == $asset->id ? 'selected' : '' }}>

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
                            {{ $ticket->user_id == $user->id ? 'selected' : '' }}>

                        {{ $user->name }}

                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-4">
                <label>Title</label>
                <input type="text"
                       name="title"
                       value="{{ old('title', $ticket->title) }}"
                       class="border w-full p-2 rounded">
            </div>

            <div class="mb-4">
                <label>Description</label>
                <textarea name="description"
                          class="border w-full p-2 rounded">{{ old('description', $ticket->description) }}</textarea>
            </div>

            <div class="mb-4">

                <label>Priority</label>

                <select name="priority"
                        class="border w-full p-2 rounded">

                    <option {{ $ticket->priority == 'Low' ? 'selected' : '' }}>Low</option>
                    <option {{ $ticket->priority == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option {{ $ticket->priority == 'High' ? 'selected' : '' }}>High</option>

                </select>

            </div>

            <div class="mb-4">

                <label>Status</label>

                <select name="status"
                        class="border w-full p-2 rounded">

                    <option {{ $ticket->status == 'Open' ? 'selected' : '' }}>Open</option>
                    <option {{ $ticket->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option {{ $ticket->status == 'Closed' ? 'selected' : '' }}>Closed</option>

                </select>

            </div>

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Update
            </button>

            <a href="{{ route('tickets.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded">

                Cancel

            </a>

        </form>

    </div>

</x-app-layout>
