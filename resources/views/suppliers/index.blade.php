<x-app-layout>

    <div class="flex items-center justify-between mb-8">

        <div>

            <h2 class="text-3xl font-bold text-gray-900">
                {{ __('suppliers.title') }}
            </h2>

            <p class="text-gray-500 mt-1">
                {{ __('suppliers.subtitle') }}
            </p>

        </div>

        <a
            href="{{ route('suppliers.create') }}"
            class="bg-black text-white px-5 py-2.5 rounded-lg hover:bg-gray-800 transition">

            + {{ __('suppliers.add_supplier') }}

        </a>

    </div>

    <div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

            <tr>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('suppliers.company_name') }}
                </th>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('suppliers.contact_person') }}
                </th>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('suppliers.email') }}
                </th>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('suppliers.phone') }}
                </th>

                <th class="px-6 py-4 text-center font-semibold">
                    {{ __('suppliers.actions') }}
                </th>

            </tr>

            </thead>

            <tbody>

            @forelse($suppliers as $supplier)

            <tr class="border-t hover:bg-gray-50">

                <td class="px-6 py-4 font-medium">
                    {{ $supplier->company_name }}
                </td>

                <td class="px-6 py-4">
                    {{ $supplier->contact_person ?: '-' }}
                </td>

                <td class="px-6 py-4">
                    {{ $supplier->email ?: '-' }}
                </td>

                <td class="px-6 py-4">
                    {{ $supplier->phone ?: '-' }}
                </td>

                <td class="px-6 py-4">

                    <div class="flex justify-center gap-2">

                        <a
                            href="{{ route('suppliers.edit', $supplier) }}"
                            class="border border-gray-300 bg-white text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-100 transition">

                            {{ __('suppliers.edit') }}

                        </a>

                        <form
                            action="{{ route('suppliers.destroy', $supplier) }}"
                            method="POST"
                            onsubmit="return confirm('{{ __('suppliers.delete_confirm') }}')">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">

                                {{ __('suppliers.delete') }}

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="5" class="px-6 py-10 text-center text-gray-500">

                    {{ __('suppliers.no_suppliers') }}

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-6">

        {{ $suppliers->links() }}

    </div>

</x-app-layout>
