<header class="border-b bg-white">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-center justify-between h-16">

            {{-- Logo --}}
            <a href="{{ url('/') }}" class="text-2xl font-bold text-gray-900">
                {{ __('messages.logo') }}
            </a>

            <div class="flex items-center gap-6">

                {{-- Language --}}
                <div class="flex items-center text-sm">

                    <a href="{{ route('language', 'fr') }}"
                       class="{{ app()->getLocale() == 'fr'
                            ? 'font-semibold text-black'
                            : 'text-gray-500 hover:text-black' }}">
                        FR
                    </a>

                    <span class="mx-2 text-gray-300">|</span>

                    <a href="{{ route('language', 'en') }}"
                       class="{{ app()->getLocale() == 'en'
                            ? 'font-semibold text-black'
                            : 'text-gray-500 hover:text-black' }}">
                        EN
                    </a>

                </div>

                @guest

                <a href="{{ route('login') }}"
                   class="rounded-md bg-slate-800 px-5 py-2 text-sm font-medium text-white hover:bg-slate-900 transition">
                    {{ __('auth.login') }}
                </a>

                @endguest


                @auth

                <a href="{{ route('dashboard') }}"
                   class="rounded-md bg-slate-800 px-5 py-2 text-sm font-medium text-white hover:bg-slate-900 transition">
                    {{ __('messages.dashboard') }}
                </a>

                @endauth

            </div>

        </div>

    </div>

</header>
