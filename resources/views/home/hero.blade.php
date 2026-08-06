<section class="bg-white">

    <div class="max-w-5xl mx-auto px-6 py-20 text-center">

        <h1 class="text-4xl font-bold text-gray-900">
            {{ __('messages.hero_title') }}
        </h1>

        <p class="mt-4 text-gray-600">
            {{ __('messages.hero_description') }}
        </p>

        <div class="mt-8 flex flex-col items-center gap-4">

            @guest

            <a href="{{ route('login') }}"
               class="px-6 py-3 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition">
                {{ __('messages.login') }}
            </a>

            <p class="text-sm text-gray-500">
                {{ __('messages.contact_admin') }}
            </p>

            @else

            <a href="{{ route('dashboard') }}"
               class="px-6 py-3 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition">
                {{ __('messages.dashboard') }}
            </a>

            @endguest

        </div>

    </div>

</section>
