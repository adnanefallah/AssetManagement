<x-app-layout>

    <div class="mb-8">

        <h2 class="text-3xl font-bold text-gray-900">
            {{ __('profile.profile_settings') }}
        </h2>

        <p class="text-gray-500 mt-1">
            {{ __('profile.profile_settings_description') }}
        </p>

    </div>

    <div class="space-y-6">

        <div class="bg-white rounded-xl border border-gray-200 shadow p-8">

            <div class="max-w-2xl">

                @include('profile.partials.update-profile-information-form')

            </div>

        </div>

        <div class="bg-white rounded-xl border border-gray-200 shadow p-8">

            <div class="max-w-2xl">

                @include('profile.partials.update-password-form')

            </div>

        </div>

        <div class="bg-white rounded-xl border border-gray-200 shadow p-8">

            <div class="max-w-2xl">

                @include('profile.partials.delete-user-form')

            </div>

        </div>

    </div>

</x-app-layout>
