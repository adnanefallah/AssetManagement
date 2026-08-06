<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center justify-between">

            <h2 class="text-2xl font-bold text-gray-900">
                {{ __('departments.title') }}
            </h2>

            <a href="{{ route('departments.create') }}"
               class="inline-flex items-center rounded-lg bg-black px-5 py-2.5 text-sm font-medium text-white hover:bg-gray-800 transition">

                + {{ __('departments.add') }}

            </a>

        </div>

    </x-slot>

    <div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">

        <table class="min-w-full">

            <thead class="bg-gray-100">

            <tr>

                <th class="px-6 py-4 text-left text-sm font-semibold">
                    {{ __('departments.id') }}
                </th>

                <th class="px-6 py-4 text-left text-sm font-semibold">
                    {{ __('departments.department') }}
                </th>

                <th class="px-6 py-4 text-left text-sm font-semibold">
                    {{ __('departments.location') }}
                </th>

                <th class="px-6 py-4 text-center text-sm font-semibold">
                    {{ __('departments.actions') }}
                </th>

            </tr>

            </thead>

            <tbody class="divide-y divide-gray-200">

            @forelse($departments as $department)

            <tr class="hover:bg-gray-50">

                <td class="px-6 py-4">
                    {{ $department->id }}
                </td>

                <td class="px-6 py-4 font-medium">
                    {{ $department->department_name }}
                </td>

                <td class="px-6 py-4">
                    {{ $department->location }}
                </td>

                <td class="px-6 py-4">

                    <div class="flex justify-center gap-2">

                        <a href="{{ route('departments.edit', $department) }}"
                           class="rounded-lg border border-gray-300 px-4 py-2 text-sm hover:bg-gray-100">

                            {{ __('departments.edit') }}

                        </a>

                        <form action="{{ route('departments.destroy', $department) }}"
                              method="POST"
                              onsubmit="return confirm('{{ __('departments.confirm_delete') }}')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="rounded-lg bg-red-600 px-4 py-2 text-sm text-white hover:bg-red-700">

                                {{ __('departments.delete') }}

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="4" class="px-6 py-10 text-center text-gray-500">

                    {{ __('departments.empty') }}

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-6">
        {{ $departments->links() }}
    </div>

</x-app-layout>
