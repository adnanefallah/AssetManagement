<x-guest-layout>

    <div class="flex justify-end mb-6 text-sm">

        <a href="{{ route('language','en') }}"
           class="{{ app()->getLocale() == 'en'
                ? 'font-bold text-black'
                : 'text-gray-500 hover:text-black' }}">
            EN
        </a>

        <span class="mx-2 text-gray-400">|</span>

        <a href="{{ route('language','fr') }}"
           class="{{ app()->getLocale() == 'fr'
                ? 'font-bold text-black'
                : 'text-gray-500 hover:text-black' }}">
            FR
        </a>

    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Email --}}
        <div>

            <x-input-label
                for="email"
                :value="__('auth.email')" />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username" />

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2" />

        </div>

        {{-- Password --}}
        <div class="mt-4">

            <x-input-label
                for="password"
                :value="__('auth.password')" />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="current-password" />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2" />

        </div>

        {{-- Remember Me --}}
        <div class="block mt-4">

            <label for="remember_me" class="inline-flex items-center">

                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">

                <span class="ms-2 text-sm text-gray-600">
                    {{ __('auth.remember_me') }}
                </span>

            </label>

        </div>

        {{-- Login Button --}}
        <div class="flex justify-end mt-6">

            <x-primary-button>
                {{ __('auth.login') }}
            </x-primary-button>

        </div>

    </form>

</x-guest-layout>
