<x-app-layout>

    <div class="mb-8">

        <h2 class="text-3xl font-bold text-gray-900">
            {{ __('activity_logs.title') }}
        </h2>

        <p class="text-gray-500 mt-1">
            {{ __('activity_logs.subtitle') }}
        </p>

    </div>

    @if(session('success'))

    <div class="mb-6 rounded-lg bg-green-100 border border-green-300 text-green-700 px-4 py-3">

        {{ session('success') }}

    </div>

    @endif

    <div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

            <tr>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('activity_logs.user') }}
                </th>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('activity_logs.action') }}
                </th>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('activity_logs.module') }}
                </th>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('activity_logs.description') }}
                </th>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('activity_logs.date_time') }}
                </th>

            </tr>

            </thead>

            <tbody>

            @forelse($logs as $log)

            <tr class="border-t hover:bg-gray-50">

                <td class="px-6 py-4">
                    {{ $log->user?->name ?? __('activity_logs.system') }}
                </td>

                <td class="px-6 py-4">

                    @if($log->action == 'Create')

                    <span class="inline-flex rounded-full bg-green-100 text-green-700 px-3 py-1 text-sm font-medium">
                                {{ __('activity_logs.create') }}
                            </span>

                    @elseif($log->action == 'Update')

                    <span class="inline-flex rounded-full bg-yellow-100 text-yellow-700 px-3 py-1 text-sm font-medium">
                                {{ __('activity_logs.update') }}
                            </span>

                    @elseif($log->action == 'Delete')

                    <span class="inline-flex rounded-full bg-red-100 text-red-700 px-3 py-1 text-sm font-medium">
                                {{ __('activity_logs.delete') }}
                            </span>

                    @else

                    <span class="inline-flex rounded-full bg-gray-100 text-gray-700 px-3 py-1 text-sm font-medium">
                                {{ $log->action }}
                            </span>

                    @endif

                </td>

                <td class="px-6 py-4">
                    {{ $log->module }}
                </td>

                <td class="px-6 py-4">
                    {{ $log->description }}
                </td>

                <td class="px-6 py-4">
                    {{ $log->created_at->format('d/m/Y H:i:s') }}
                </td>

            </tr>

            @empty

            <tr>

                <td colspan="5" class="px-6 py-10 text-center text-gray-500">

                    {{ __('activity_logs.no_logs') }}

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-6">

        {{ $logs->links() }}

    </div>

</x-app-layout>
