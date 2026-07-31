<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Activity Logs
        </h2>
    </x-slot>

    <div class="p-6">

        @if(session('success'))
        <div class="mb-4 rounded bg-green-100 border border-green-400 px-4 py-3 text-green-700">
            {{ session('success') }}
        </div>
        @endif

        <div class="bg-white shadow rounded-lg overflow-hidden">

            <table class="w-full border-collapse">

                <thead class="bg-gray-200">

                <tr>

                    <th class="border px-4 py-2 text-left">
                        User
                    </th>

                    <th class="border px-4 py-2 text-left">
                        Action
                    </th>

                    <th class="border px-4 py-2 text-left">
                        Module
                    </th>

                    <th class="border px-4 py-2 text-left">
                        Description
                    </th>

                    <th class="border px-4 py-2 text-left">
                        Date & Time
                    </th>

                </tr>

                </thead>

                <tbody>

                @forelse($logs as $log)

                <tr class="hover:bg-gray-50">

                    <td class="border px-4 py-2">
                        {{ $log->user?->name ?? 'System' }}
                    </td>

                    <td class="border px-4 py-2">

                        @if($log->action == 'Create')

                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm">
                                        {{ $log->action }}
                                    </span>

                        @elseif($log->action == 'Update')

                        <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-sm">
                                        {{ $log->action }}
                                    </span>

                        @elseif($log->action == 'Delete')

                        <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-sm">
                                        {{ $log->action }}
                                    </span>

                        @else

                        <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded text-sm">
                                        {{ $log->action }}
                                    </span>

                        @endif

                    </td>

                    <td class="border px-4 py-2">
                        {{ $log->module }}
                    </td>

                    <td class="border px-4 py-2">
                        {{ $log->description }}
                    </td>

                    <td class="border px-4 py-2">
                        {{ $log->created_at->format('d/m/Y H:i:s') }}
                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="border px-4 py-6 text-center text-gray-500">

                        No activity logs found.

                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-6">

            {{ $logs->links() }}

        </div>

    </div>

</x-app-layout>
