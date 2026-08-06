<x-app-layout>

    <div class="flex items-center justify-between mb-8">

        <h2 class="text-3xl font-bold text-gray-900">
            {{ __('categories.title') }}
        </h2>

        <a href="{{ route('categories.create') }}"
           class="bg-black text-white px-5 py-2.5 rounded-lg hover:bg-gray-800 transition">

            + {{ __('categories.add') }}

        </a>

    </div>

    <div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

            <tr>

                <th class="text-left px-6 py-4 font-semibold">
                    {{ __('categories.id') }}
                </th>

                <th class="text-left px-6 py-4 font-semibold">
                    {{ __('categories.category_name') }}
                </th>

                <th class="text-left px-6 py-4 font-semibold">
                    {{ __('categories.description') }}
                </th>

                <th class="text-center px-6 py-4 font-semibold">
                    {{ __('categories.actions') }}
                </th>

            </tr>

            </thead>

            <tbody>

            @forelse($categories as $category)

            <tr class="border-t hover:bg-gray-50">

                <td class="px-6 py-4">
                    {{ $category->id }}
                </td>

                <td class="px-6 py-4 font-medium">
                    {{ $category->category_name }}
                </td>

                <td class="px-6 py-4">
                    {{ $category->description ?: '-' }}
                </td>

                <td class="px-6 py-4">

                    <div class="flex justify-center gap-3">

                        <a href="{{ route('categories.edit', $category) }}"
                           class="border border-gray-300 px-4 py-2 rounded-lg hover:bg-gray-100 transition">

                            {{ __('categories.edit') }}

                        </a>

                        <form action="{{ route('categories.destroy', $category) }}"
                              method="POST"
                              onsubmit="return confirm('{{ __('categories.confirm_delete') }}')">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">

                                {{ __('categories.delete') }}

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="4" class="text-center py-8 text-gray-500">

                    {{ __('categories.empty') }}

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-6">
        {{ $categories->links() }}
    </div>

</x-app-layout>
