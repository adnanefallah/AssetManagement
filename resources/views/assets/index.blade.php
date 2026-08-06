<x-app-layout>

    <div class="flex items-center justify-between mb-8">

        <div>

            <h2 class="text-3xl font-bold text-gray-900">
                {{ __('assets.title') }}
            </h2>

            <p class="text-gray-500 mt-1">
                {{ __('assets.subtitle') }}
            </p>

        </div>

        @if(!auth()->user()->isUser())

        <div class="flex gap-3">

            <a href="{{ route('assets.create') }}"
               class="bg-black text-white px-5 py-2.5 rounded-lg hover:bg-gray-800 transition">
                + {{ __('assets.add') }}
            </a>

            <a href="{{ route('assets.pdf') }}"
               class="border border-gray-300 bg-white text-gray-700 px-5 py-2.5 rounded-lg hover:bg-gray-100 transition">
                {{ __('assets.export_pdf') }}
            </a>

            <a href="{{ route('assets.excel') }}"
               class="border border-gray-300 bg-white text-gray-700 px-5 py-2.5 rounded-lg hover:bg-gray-100 transition">
                {{ __('assets.export_excel') }}
            </a>

        </div>

        @endif

    </div>

    @if(session('success'))

    <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-green-700">
        {{ session('success') }}
    </div>

    @endif

    <div class="bg-white rounded-xl border border-gray-200 shadow p-6 mb-6">

        <form action="{{ route('assets.index') }}" method="GET">

            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="{{ __('assets.search') }}"
                    class="rounded-lg border-gray-300">

                <select name="category" class="rounded-lg border-gray-300">

                    <option value="">
                        {{ __('assets.all_categories') }}
                    </option>

                    @foreach($categories as $category)

                    <option
                        value="{{ $category->id }}"
                        {{ request('category') == $category->id ? 'selected' : '' }}>

                    {{ $category->category_name }}

                    </option>

                    @endforeach

                </select>

                <select name="supplier" class="rounded-lg border-gray-300">

                    <option value="">
                        {{ __('assets.all_suppliers') }}
                    </option>

                    @foreach($suppliers as $supplier)

                    <option
                        value="{{ $supplier->id }}"
                        {{ request('supplier') == $supplier->id ? 'selected' : '' }}>

                    {{ $supplier->company_name }}

                    </option>

                    @endforeach

                </select>

                <select name="status" class="rounded-lg border-gray-300">

                    <option value="">
                        {{ __('assets.all_status') }}
                    </option>

                    <option value="Available" {{ request('status') == 'Available' ? 'selected' : '' }}>
                    {{ __('assets.available') }}
                    </option>

                    <option value="Assigned" {{ request('status') == 'Assigned' ? 'selected' : '' }}>
                    {{ __('assets.assigned') }}
                    </option>

                    <option value="Maintenance" {{ request('status') == 'Maintenance' ? 'selected' : '' }}>
                    {{ __('assets.maintenance') }}
                    </option>

                    <option value="Retired" {{ request('status') == 'Retired' ? 'selected' : '' }}>
                    {{ __('assets.retired') }}
                    </option>

                </select>

                <div class="flex gap-2">

                    <button
                        type="submit"
                        class="bg-black text-white px-4 rounded-lg hover:bg-gray-800 transition">

                        {{ __('assets.filter') }}

                    </button>

                    <a
                        href="{{ route('assets.index') }}"
                        class="border border-gray-300 bg-white text-gray-700 px-4 rounded-lg flex items-center hover:bg-gray-100 transition">

                        {{ __('assets.reset') }}

                    </a>

                </div>

            </div>

    </div>

    <div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

            <tr>

                <th class="px-5 py-4 text-left">
                    {{ __('assets.image') }}
                </th>

                <th class="px-5 py-4 text-left">
                    {{ __('assets.code') }}
                </th>

                <th class="px-5 py-4 text-left">
                    {{ __('assets.name') }}
                </th>

                <th class="px-5 py-4 text-left">
                    {{ __('assets.serial') }}
                </th>

                <th class="px-5 py-4 text-left">
                    {{ __('assets.category') }}
                </th>

                <th class="px-5 py-4 text-left">
                    {{ __('assets.supplier') }}
                </th>

                <th class="px-5 py-4 text-left">
                    {{ __('assets.status') }}
                </th>

                <th class="px-5 py-4 text-left">
                    {{ __('assets.warranty') }}
                </th>

                <th class="px-5 py-4 text-left">
                    {{ __('assets.location') }}
                </th>

                <th class="px-5 py-4 text-center">
                    {{ __('assets.actions') }}
                </th>

            </tr>

            </thead>

            <tbody>
            @forelse($assets as $asset)

            <tr class="border-t hover:bg-gray-50">

                <td class="px-5 py-4">

                    @if($asset->image)

                    <img
                        src="{{ asset('storage/'.$asset->image) }}"
                        alt="{{ $asset->asset_name }}"
                        class="w-14 h-14 rounded-lg object-cover border">

                    @else

                    <div class="w-14 h-14 rounded-lg bg-gray-100 flex items-center justify-center text-gray-400">
                        —
                    </div>

                    @endif

                </td>

                <td class="px-5 py-4">
                    {{ $asset->asset_code }}
                </td>

                <td class="px-5 py-4 font-medium">
                    {{ $asset->asset_name }}
                </td>

                <td class="px-5 py-4">
                    {{ $asset->serial_number }}
                </td>

                <td class="px-5 py-4">
                    {{ $asset->category->category_name ?? '-' }}
                </td>

                <td class="px-5 py-4">
                    {{ $asset->supplier->company_name ?? '-' }}
                </td>

                <td class="px-5 py-4">

                    @php

                    $color = match($asset->status){
                    'Available' => 'bg-green-100 text-green-700',
                    'Assigned' => 'bg-blue-100 text-blue-700',
                    'Maintenance' => 'bg-yellow-100 text-yellow-700',
                    'Retired' => 'bg-red-100 text-red-700',
                    default => 'bg-gray-100 text-gray-700'
                    };

                    @endphp

                    <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $color }}">

                        @switch($asset->status)

                            @case('Available')
                                {{ __('assets.available') }}
                                @break

                            @case('Assigned')
                                {{ __('assets.assigned') }}
                                @break

                            @case('Maintenance')
                                {{ __('assets.maintenance') }}
                                @break

                            @case('Retired')
                                {{ __('assets.retired') }}
                                @break

                            @default
                                {{ $asset->status }}

                        @endswitch

                    </span>

                </td>

                <td class="px-5 py-4">
                    {{ $asset->warranty_expiry ?? '-' }}
                </td>

                <td class="px-5 py-4">
                    {{ $asset->location ?? '-' }}
                </td>

                <td class="px-5 py-4">

                    <div class="flex justify-center gap-2 flex-wrap">

                        @if(!auth()->user()->isUser())

                        <a
                            href="{{ route('assets.edit', $asset) }}"
                            class="px-3 py-2 border border-gray-300 rounded-lg bg-white text-gray-700 hover:bg-gray-100 transition">

                            {{ __('assets.edit') }}

                        </a>

                        <a
                            href="{{ route('assets.qrcode', $asset) }}"
                            class="px-3 py-2 border border-gray-300 rounded-lg bg-white text-gray-700 hover:bg-gray-100 transition">

                            {{ __('assets.qr') }}

                        </a>

                        <a
                            href="{{ route('assets.history', $asset) }}"
                            class="px-3 py-2 border border-gray-300 rounded-lg bg-white text-gray-700 hover:bg-gray-100 transition">

                            {{ __('assets.history') }}

                        </a>

                        <form
                            action="{{ route('assets.destroy', $asset) }}"
                            method="POST"
                            onsubmit="return confirm('{{ __('assets.confirm_delete') }}')">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="px-3 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 transition">

                                {{ __('assets.delete') }}

                            </button>

                        </form>

                        @endif

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="10" class="py-10 text-center text-gray-500">

                    {{ __('assets.empty') }}

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-6">
        {{ $assets->links() }}
    </div>

</x-app-layout>
