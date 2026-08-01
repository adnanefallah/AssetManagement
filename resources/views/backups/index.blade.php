<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Database Backups
        </h2>
    </x-slot>

    <div class="p-6">

        @if(session('success'))
        <div class="mb-4 rounded bg-green-100 border border-green-400 text-green-700 px-4 py-3">
            {{ session('success') }}
        </div>
        @endif

        <div class="flex justify-between items-center mb-6">

            <h3 class="text-lg font-semibold">
                Available Backups
            </h3>

            <form action="{{ route('backups.create') }}" method="POST">
                @csrf

                <button
                    type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">

                    Create Backup

                </button>

            </form>

        </div>

        <table class="w-full border border-gray-300">

            <thead class="bg-gray-100">

            <tr>

                <th class="border px-4 py-2 text-left">
                    Backup File
                </th>

                <th class="border px-4 py-2 text-center">
                    Size
                </th>

                <th class="border px-4 py-2 text-center">
                    Actions
                </th>

            </tr>

            </thead>

            <tbody>

            @forelse($files as $file)

            <tr>

                <td class="border px-4 py-2">
                    {{ basename($file) }}
                </td>

                <td class="border px-4 py-2 text-center">
                    {{ number_format(Storage::disk('local')->size($file) / 1024 / 1024, 2) }} MB
                </td>

                <td class="border px-4 py-2 text-center">

                    <div class="flex justify-center gap-2">

                        <a
                            href="{{ route('backups.download', basename($file)) }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded">

                            Download

                        </a>

                        <form
                            action="{{ route('backups.destroy', basename($file)) }}"
                            method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                onclick="return confirm('Delete this backup?')"
                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">

                                Delete

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="3" class="text-center py-6 text-gray-500">

                    No backups found.

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</x-app-layout>
