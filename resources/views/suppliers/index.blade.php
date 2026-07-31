<x-app-layout>

    <x-slot name="header">
        <h2>Suppliers</h2>
    </x-slot>

    <div class="p-6">

        <a href="{{ route('suppliers.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded">
            + Add Supplier
        </a>

        <table class="table-auto w-full mt-5 border">

            <thead class="bg-gray-200">
            <tr>
                <th class="border px-3 py-2">Company</th>
                <th class="border px-3 py-2">Contact</th>
                <th class="border px-3 py-2">Email</th>
                <th class="border px-3 py-2">Phone</th>
                <th class="border px-3 py-2">Actions</th>
            </tr>
            </thead>

            <tbody>

            @foreach($suppliers as $supplier)

            <tr>

                <td class="border px-3 py-2">{{ $supplier->company_name }}</td>

                <td class="border px-3 py-2">{{ $supplier->contact_person }}</td>

                <td class="border px-3 py-2">{{ $supplier->email }}</td>

                <td class="border px-3 py-2">{{ $supplier->phone }}</td>

                <td class="border px-3 py-2">

                    <a href="{{ route('suppliers.edit',$supplier) }}"
                       class="bg-yellow-500 text-white px-3 py-1 rounded">
                        Edit
                    </a>

                    <form action="{{ route('suppliers.destroy',$supplier) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button
                            class="bg-red-600 text-white px-3 py-1 rounded"
                            onclick="return confirm('Delete supplier?')">
                            Delete
                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

            </tbody>

        </table>

        <div class="mt-5">
            {{ $suppliers->links() }}
        </div>

    </div>

</x-app-layout>
