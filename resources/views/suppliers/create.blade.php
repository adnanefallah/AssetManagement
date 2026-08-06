<x-app-layout>

    <div class="max-w-4xl mx-auto">

        <div class="mb-8">

            <h2 class="text-3xl font-bold text-gray-900">
                {{ __('suppliers.create_supplier') }}
            </h2>

            <p class="text-gray-500 mt-1">
                {{ __('suppliers.create_supplier_description') }}
            </p>

        </div>

        <div class="bg-white rounded-xl shadow border border-gray-200 p-8">

            <form action="{{ route('suppliers.store') }}" method="POST">

                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('suppliers.company_name') }}
                        </label>

                        <input
                            type="text"
                            name="company_name"
                            value="{{ old('company_name') }}"
                            class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">

                    </div>

                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('suppliers.contact_person') }}
                        </label>

                        <input
                            type="text"
                            name="contact_person"
                            value="{{ old('contact_person') }}"
                            class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">

                    </div>

                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('suppliers.email') }}
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">

                    </div>

                    <div>

                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('suppliers.phone') }}
                        </label>

                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone') }}"
                            class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">

                    </div>

                </div>

                <div class="mt-6">

                    <label class="block mb-2 font-medium text-gray-700">
                        {{ __('suppliers.address') }}
                    </label>

                    <textarea
                        name="address"
                        rows="4"
                        class="w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">{{ old('address') }}</textarea>

                </div>

                <div class="flex gap-3 mt-8">

                    <button
                        type="submit"
                        class="bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition">

                        {{ __('suppliers.save_supplier') }}

                    </button>

                    <a
                        href="{{ route('suppliers.index') }}"
                        class="border border-gray-300 bg-white text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-100 transition">

                        {{ __('suppliers.cancel') }}

                    </a>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>
