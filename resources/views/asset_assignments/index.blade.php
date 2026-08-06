<x-app-layout>

    <div class="flex items-center justify-between mb-8">

        <div>

            <h2 class="text-3xl font-bold text-gray-900">
                {{ __('assignments.title') }}
            </h2>

            <p class="text-gray-500 mt-1">
                {{ __('assignments.subtitle') }}
            </p>

        </div>

        <a
            href="{{ route('asset-assignments.create') }}"
            class="bg-black text-white px-5 py-2.5 rounded-lg hover:bg-gray-800 transition">

            + {{ __('assignments.assign_asset') }}

        </a>

    </div>

    <div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

            <tr>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('assignments.asset') }}
                </th>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('assignments.user') }}
                </th>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('assignments.assigned_date') }}
                </th>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('assignments.returned_date') }}
                </th>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('assignments.status') }}
                </th>

                <th class="px-6 py-4 text-center font-semibold">
                    {{ __('assignments.actions') }}
                </th>

            </tr>

            </thead>

            <tbody>

            @forelse($assignments as $assignment)

            <tr class="border-t hover:bg-gray-50">

                <td class="px-6 py-4 font-medium">
                    {{ $assignment->asset->asset_name }}
                </td>

                <td class="px-6 py-4">
                    {{ $assignment->user->name }}
                </td>

                <td class="px-6 py-4">
                    {{ $assignment->assigned_date }}
                </td>

                <td class="px-6 py-4">
                    {{ $assignment->returned_date ?? '-' }}
                </td>

                <td class="px-6 py-4">

                    <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-sm font-medium text-gray-700">
                        {{ $assignment->status }}
                    </span>

                </td>

                <td class="px-6 py-4">

                    <div class="flex justify-center gap-2">

                        <a
                            href="{{ route('asset-assignments.edit', $assignment) }}"
                            class="border border-gray-300 bg-white text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-100 transition">

                            {{ __('assignments.edit') }}

                        </a>

                        <form
                            action="{{ route('asset-assignments.destroy', $assignment) }}"
                            method="POST"
                            onsubmit="return confirm('{{ __('assignments.delete_confirm') }}')">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">

                                {{ __('assignments.delete') }}

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6" class="px-6 py-10 text-center text-gray-500">

                    {{ __('assignments.no_assignments') }}

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-6">

        {{ $assignments->links() }}

    </div>

</x-app-layout>
