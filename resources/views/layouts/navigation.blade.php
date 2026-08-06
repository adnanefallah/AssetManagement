<nav x-data="{ open: false }"
     class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-8">

    <!-- Logo -->
    <div>
        <h1 class="text-xl font-bold text-gray-900">
            {{ __('navigation.asset_management') }}
        </h1>
    </div>

    <!-- Right Side -->
    <div class="flex items-center gap-6">

        <!-- Language -->
        <div class="flex items-center gap-2 text-sm font-medium">

            <a href="{{ route('language','en') }}"
               class="{{ app()->getLocale()=='en'
                    ? 'text-black font-bold'
                    : 'text-gray-500 hover:text-black' }}">
                EN
            </a>

            <span class="text-gray-400">|</span>

            <a href="{{ route('language','fr') }}"
               class="{{ app()->getLocale()=='fr'
                    ? 'text-black font-bold'
                    : 'text-gray-500 hover:text-black' }}">
                FR
            </a>

        </div>

        <!-- User -->
        <div class="relative">

            <button
                @click="open = !open"
                class="flex items-center gap-3 focus:outline-none">

                <!-- Name + Role -->
                <div class="text-right">

                    <p class="text-sm font-semibold text-gray-900">
                        {{ Auth::user()->name }}
                    </p>

                    <p class="text-xs font-medium mt-1">

                        @if(Auth::user()->role == 'Administrator')

                        <span class="text-red-600">
                                {{ __('users.administrator') }}
                            </span>

                        @elseif(Auth::user()->role == 'Technician')

                        <span class="text-blue-600">
                                {{ __('users.technician') }}
                            </span>

                        @else

                        <span class="text-gray-600">
                                {{ __('users.user') }}
                            </span>

                        @endif

                    </p>

                </div>

                <!-- Avatar -->
                <img
                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=111827&color=ffffff"
                    class="w-10 h-10 rounded-full"
                    alt="{{ __('navigation.avatar') }}">

            </button>

            <!-- Dropdown -->
            <div
                x-show="open"
                @click.away="open = false"
                x-transition
                class="absolute right-0 mt-3 w-64 bg-white rounded-xl shadow-xl border border-gray-200 overflow-hidden z-50">

                <!-- User Info -->
                <div class="px-5 py-4 border-b bg-gray-50">

                    <p class="font-semibold text-gray-900">
                        {{ Auth::user()->name }}
                    </p>

                    <p class="text-sm text-gray-500 mt-1">
                        {{ Auth::user()->email }}
                    </p>

                </div>

                <!-- Profile -->
                <a href="{{ route('profile.edit') }}"
                   class="block px-5 py-3 text-sm text-gray-700 hover:bg-gray-100 transition">

                    {{ __('navigation.profile') }}

                </a>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="w-full text-left px-5 py-3 text-sm text-red-600 hover:bg-red-50 transition">

                        {{ __('navigation.logout') }}

                    </button>

                </form>

            </div>

        </div>

    </div>

</nav>
