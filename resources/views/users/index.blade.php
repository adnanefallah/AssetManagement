<x-app-layout>

    <div class="flex items-center justify-between mb-8">

        <div>

            <h2 class="text-3xl font-bold text-gray-900">
                {{ __('users.title') }}
            </h2>

            <p class="text-gray-500 mt-1">
                {{ __('users.description') }}
            </p>

        </div>

        <a
            href="{{ route('users.create') }}"
            class="bg-black text-white px-5 py-2.5 rounded-lg hover:bg-gray-800 transition">

            + {{ __('users.add_user') }}

        </a>

    </div>

    @if(session('success'))

    <div class="mb-6 rounded-lg border border-green-300 bg-green-100 px-4 py-3 text-green-700">
        {{ session('success') }}
    </div>

    @endif

    <div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

            <tr>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('users.name') }}
                </th>

                <th class="px-6 py-4 text-left font-semibold">
                    {{ __('users.email') }}
                </th>

                <th class="px-6 py-4 text-center font-semibold">
                    {{ __('users.role') }}
                </th>

                <th class="px-6 py-4 text-center font-semibold">
                    {{ __('users.status') }}
                </th>

                <th class="px-6 py-4 text-center font-semibold">
                    {{ __('users.actions') }}
                </th>

            </tr>

            </thead>

            <tbody>

            @forelse($users as $user)

            <tr class="border-t hover:bg-gray-50">

                <td class="px-6 py-4 font-medium">
                    {{ $user->name }}
                </td>

                <td class="px-6 py-4">
                    {{ $user->email }}
                </td>

                <td class="px-6 py-4 text-center">

                    @switch($user->role)

                    @case('Administrator')

                    <span class="inline-flex rounded-full bg-red-100 text-red-700 px-3 py-1 text-sm font-medium">
                                        {{ __('users.administrator') }}
                                    </span>

                    @break

                    @case('Technician')

                    <span class="inline-flex rounded-full bg-blue-100 text-blue-700 px-3 py-1 text-sm font-medium">
                                        {{ __('users.technician') }}
                                    </span>

                    @break

                    @default

                    <span class="inline-flex rounded-full bg-gray-100 text-gray-700 px-3 py-1 text-sm font-medium">
                                        {{ __('users.user') }}
                                    </span>

                    @endswitch

                </td>

                <td class="px-6 py-4 text-center">

                    @if($user->status == 'Active')

                    <span class="inline-flex rounded-full bg-green-100 text-green-700 px-3 py-1 text-sm font-medium">
                                    {{ __('users.active') }}
                                </span>

                    @else

                    <span class="inline-flex rounded-full bg-red-100 text-red-700 px-3 py-1 text-sm font-medium">
                                    {{ __('users.inactive') }}
                                </span>

                    @endif

                </td>

                <td class="px-6 py-4">

                    <div class="flex justify-center gap-2">

                        <a
                            href="{{ route('users.edit', $user) }}"
                            class="border border-gray-300 bg-white text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-100 transition">

                            {{ __('users.edit') }}

                        </a>

                        <form
                            action="{{ route('users.destroy', $user) }}"
                            method="POST"
                            onsubmit="return confirm('{{ __('users.delete_confirm') }}')">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">

                                {{ __('users.delete') }}

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="5" class="px-6 py-10 text-center text-gray-500">

                    {{ __('users.no_users') }}

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-6">

        {{ $users->links() }}

    </div>

</x-app-layout>
