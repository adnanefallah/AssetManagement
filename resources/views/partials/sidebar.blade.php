<aside class="w-64 bg-white border-r border-gray-200 flex flex-col">

    {{-- Logo --}}
    <div class="h-16 flex items-center px-6 border-b border-gray-200">

        <h2 class="text-lg font-bold text-gray-900">
            {{ __('sidebar.menu') }}
        </h2>

    </div>

    {{-- Navigation --}}
    <nav class="flex-1 p-4 space-y-2">

        {{-- Dashboard (Everyone) --}}
        <a href="{{ route('dashboard') }}"
           class="block rounded-lg px-4 py-2 hover:bg-gray-100">
            {{ __('sidebar.dashboard') }}
        </a>

        {{-- ================================================= --}}
        {{-- Administrator --}}
        {{-- ================================================= --}}
        @if(auth()->user()->isAdmin())

        <a href="{{ route('users.index') }}"
           class="block rounded-lg px-4 py-2 hover:bg-gray-100">
            {{ __('users.title') }}
        </a>

        <a href="{{ route('assets.index') }}"
           class="block rounded-lg px-4 py-2 hover:bg-gray-100">
            {{ __('sidebar.assets') }}
        </a>

        <a href="{{ route('categories.index') }}"
           class="block rounded-lg px-4 py-2 hover:bg-gray-100">
            {{ __('sidebar.categories') }}
        </a>

        <a href="{{ route('suppliers.index') }}"
           class="block rounded-lg px-4 py-2 hover:bg-gray-100">
            {{ __('sidebar.suppliers') }}
        </a>

        <a href="{{ route('departments.index') }}"
           class="block rounded-lg px-4 py-2 hover:bg-gray-100">
            {{ __('sidebar.departments') }}
        </a>

        <a href="{{ route('asset-assignments.index') }}"
           class="block rounded-lg px-4 py-2 hover:bg-gray-100">
            {{ __('sidebar.assignments') }}
        </a>

        <a href="{{ route('maintenances.index') }}"
           class="block rounded-lg px-4 py-2 hover:bg-gray-100">
            {{ __('sidebar.maintenance') }}
        </a>

        <a href="{{ route('tickets.index') }}"
           class="block rounded-lg px-4 py-2 hover:bg-gray-100">
            {{ __('sidebar.tickets') }}
        </a>

        <a href="{{ route('reports.index') }}"
           class="block rounded-lg px-4 py-2 hover:bg-gray-100">
            {{ __('sidebar.reports') }}
        </a>

        <a href="{{ route('activity-logs.index') }}"
           class="block rounded-lg px-4 py-2 hover:bg-gray-100">
            {{ __('sidebar.activity_logs') }}
        </a>

        @endif

        {{-- ================================================= --}}
        {{-- Technician --}}
        {{-- ================================================= --}}
        @if(auth()->user()->isTechnician())

        <a href="{{ route('assets.index') }}"
           class="block rounded-lg px-4 py-2 hover:bg-gray-100">
            {{ __('sidebar.assets') }}
        </a>

        <a href="{{ route('asset-assignments.index') }}"
           class="block rounded-lg px-4 py-2 hover:bg-gray-100">
            {{ __('sidebar.assignments') }}
        </a>

        <a href="{{ route('maintenances.index') }}"
           class="block rounded-lg px-4 py-2 hover:bg-gray-100">
            {{ __('sidebar.maintenance') }}
        </a>

        <a href="{{ route('tickets.index') }}"
           class="block rounded-lg px-4 py-2 hover:bg-gray-100">
            {{ __('sidebar.tickets') }}
        </a>

        @endif

        {{-- ================================================= --}}
        {{-- User --}}
        {{-- ================================================= --}}
        @if(auth()->user()->isUser())

        <a href="{{ route('assets.index') }}"
           class="block rounded-lg px-4 py-2 hover:bg-gray-100">
            {{ __('sidebar.assets') }}
        </a>

        <a href="{{ route('tickets.index') }}"
           class="block rounded-lg px-4 py-2 hover:bg-gray-100">
            {{ __('sidebar.tickets') }}
        </a>

        @endif

    </nav>

</aside>
