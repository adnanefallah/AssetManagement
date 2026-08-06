<x-app-layout>

    <div class="flex items-center justify-between mb-8">

        <div>

            <h1 class="text-3xl font-bold text-gray-900">
                {{ __('departments.create_title') }}
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                {{ __('departments.create_subtitle') }}
            </p>

        </div>

        <a href="{{ route('departments.index') }}"
           class="px-4 py-2 border rounded-lg hover:bg-gray-100">

            ← {{ __('departments.back') }}

        </a>

    </div>

    <div class="bg-white rounded-xl shadow border p-8">

        <form action="{{ route('departments.store') }}" method="POST">

            @csrf

            {{-- Department Name --}}
            <div class="mb-6">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    {{ __('departments.department_name') }}
                </label>

                <input
                    type="text"
                    name="department_name"
                    value="{{ old('department_name') }}"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                    placeholder="{{ __('departments.department_placeholder') }}"
                    required
                >

                @error('department_name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror

            </div>

            {{-- Location --}}
            <div class="mb-6">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    {{ __('departments.location') }}
                </label>

                <input
                    type="text"
                    name="location"
                    value="{{ old('location') }}"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                    placeholder="{{ __('departments.location_placeholder') }}"
                >

                @error('location')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror

            </div>

            {{-- Description --}}
            <div class="mb-8">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    {{ __('departments.description') }}
                </label>

                <textarea
                    name="description"
                    rows="4"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                    placeholder="{{ __('departments.description_placeholder') }}"
                >{{ old('description') }}</textarea>

                @error('description')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror

            </div>

            <div class="flex items-center gap-3">

                <button
                    type="submit"
                    class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-800 transition">

                    {{ __('departments.save') }}

                </button>

                <a href="{{ route('departments.index') }}"
                   class="px-6 py-2 border rounded-lg hover:bg-gray-100">

                    {{ __('departments.cancel') }}

                </a>

            </div>

        </form>

    </div>

</x-app-layout>
