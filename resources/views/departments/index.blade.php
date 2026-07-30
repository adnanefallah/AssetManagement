<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Departments
        </h2>
    </x-slot>

    <div class="p-6">

        <a href="{{ route('departments.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded">
            + Add Department
        </a>

        <table class="table-auto w-full mt-6 border">

            <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">ID</th>
                <th class="border p-2">Department</th>
                <th class="border p-2">Location</th>
                <th class="border p-2">Actions</th>
            </tr>
            </thead>

            <tbody>

            @forelse($departments as $department)

            <tr>

                <td class="border p-2">
                    {{ $department->id }}
                </td>

                <td class="border p-2">
                    {{ $department->department_name }}
                </td>

                <td class="border p-2">
                    {{ $department->location }}
                </td>

                <td class="border p-2">

                    <a href="{{ route('departments.edit',$department) }}">
                        Edit
                    </a>

                    |

                    <form
                        action="{{ route('departments.destroy',$department) }}"
                        method="POST"
                        class="inline">

                        @csrf
                        @method('DELETE')

                        <button
                            onclick="return confirm('Delete this department?')">
                            Delete
                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="4" class="text-center p-4">
                    No departments found.
                </td>
            </tr>

            @endforelse

            </tbody>

        </table>

        <div class="mt-4">
            {{ $departments->links() }}
        </div>

    </div>

</x-app-layout>
