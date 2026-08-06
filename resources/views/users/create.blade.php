<x-app-layout>

    <div class="max-w-4xl mx-auto">

        <div class="mb-8">

            <h2 class="text-3xl font-bold text-gray-900">
                {{ __('users.create_user') }}
            </h2>

            <p class="text-gray-500 mt-1">
                {{ __('users.create_description') }}
            </p>

        </div>

        <div class="bg-white rounded-xl shadow border border-gray-200 p-8">

            <form action="{{ route('users.store') }}" method="POST">

                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Name --}}
                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('users.name') }}
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            autocomplete="name"
                            class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black"
                            required>

                        @error('name')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>

                    {{-- Email --}}
                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('users.email') }}
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black"
                            required>

                        @error('email')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>

                    {{-- Password --}}
                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('users.password') }}
                        </label>

                        <input
                            type="password"
                            name="password"
                            autocomplete="new-password"
                            class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black"
                            required>

                        @error('password')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>

                    {{-- Confirm Password --}}
                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('users.confirm_password') }}
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            autocomplete="new-password"
                            class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black"
                            required>

                    </div>

                    {{-- Role --}}
                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('users.role') }}
                        </label>

                        <select
                            name="role"
                            class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">

                            <option value="Administrator"
                                    {{ old('role') == 'Administrator' ? 'selected' : '' }}>
                            {{ __('users.administrator') }}
                            </option>

                            <option value="Technician"
                                    {{ old('role') == 'Technician' ? 'selected' : '' }}>
                            {{ __('users.technician') }}
                            </option>

                            <option value="User"
                                    {{ old('role', 'User') == 'User' ? 'selected' : '' }}>
                            {{ __('users.user') }}
                            </option>

                        </select>

                        @error('role')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>

                    {{-- Status --}}
                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('users.status') }}
                        </label>

                        <select
                            name="status"
                            class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">

                            <option value="Active"
                                    {{ old('status', 'Active') == 'Active' ? 'selected' : '' }}>
                            {{ __('users.active') }}
                            </option>

                            <option value="Inactive"
                                    {{ old('status') == 'Inactive' ? 'selected' : '' }}>
                            {{ __('users.inactive') }}
                            </option>

                        </select>

                        @error('status')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>

                </div>

                <div class="flex gap-3 mt-8">

                    <button
                        type="submit"
                        class="bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition">

                        {{ __('users.save_user') }}

                    </button>

                    <a
                        href="{{ route('users.index') }}"
                        class="border border-gray-300 bg-white text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-100 transition">

                        {{ __('users.cancel') }}

                    </a>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>
