<x-app-layout>

    <div class="max-w-3xl mx-auto">

        <h2 class="text-3xl font-bold text-gray-900 mb-8">
            {{ __('categories.create_title') }}
        </h2>

        <div class="bg-white rounded-xl shadow border border-gray-200 p-8">

            <form action="{{ route('categories.store') }}" method="POST">

                @csrf

                <div class="mb-6">

                    <label class="block mb-2 font-medium text-gray-700">
                        {{ __('categories.category_name') }}
                    </label>

                    <input
                        type="text"
                        name="category_name"
                        value="{{ old('category_name') }}"
                        placeholder="{{ __('categories.category_placeholder') }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-black focus:ring-black">

                    @error('category_name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                </div>

                <div class="mb-8">

                    <label class="block mb-2 font-medium text-gray-700">
                        {{ __('categories.description') }}
                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        placeholder="{{ __('categories.description_placeholder') }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-black focus:ring-black">{{ old('description') }}</textarea>

                    @error('description')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                </div>

                <div class="flex gap-3">

                    <button
                        type="submit"
                        class="bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition">

                        {{ __('categories.save') }}

                    </button>

                    <a
                        href="{{ route('categories.index') }}"
                        class="border border-gray-300 px-6 py-3 rounded-lg hover:bg-gray-100 transition">

                        {{ __('categories.cancel') }}

                    </a>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>
