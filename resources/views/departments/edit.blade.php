<x-app-layout>

    <div class="flex items-center justify-between mb-8">

        <div>

            <h1 class="text-3xl font-bold text-gray-900">
                {{ __('departments.edit_title') }}
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                {{ __('departments.edit_subtitle') }}
            </p>

        </div>

        <a href="{{ route('departments.index') }}"
           class="px-4 py-2 border rounded-lg hover:bg-gray-100">

            ← {{ __('departments.back') }}

        </a>

    </div>

    <div class="bg-white rounded-xl shadow border p-8">

        <form action="{{ route('departments.update', $department) }}" method="POST">

            @csrf
            @method('PUT')

            {{-- Department Name --}}
            <div class="mb-6">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    {{ __('departments.department_name') }}
                </label>

                <input
                    type="text"
                    name="department_name"
                    value="{{ old('department_name', $department->department_name) }}"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
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
                    value="{{ old('location', $department->location) }}"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
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
                >{{ old('description', $department->description) }}</textarea>

                @error('description')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror

            </div>

            <div class="flex items-center gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">

                    {{ __('departments.update') }}

                </button>

                <a href="{{ route('departments.index') }}"
                   class="px-6 py-2 border rounded-lg hover:bg-gray-100">

                    {{ __('departments.cancel') }}

                </a>

            </div>

        </form>

    </div>

</x-app-layout>
