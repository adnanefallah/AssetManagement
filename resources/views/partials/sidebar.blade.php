<div class="w-64 min-h-screen bg-dark text-white position-fixed">

    <div class="p-4 border-bottom">
        <h4 class="fw-bold">Asset Management</h4>
    </div>

    <ul class="nav flex-column p-3">

        <li class="nav-item mb-2">
            <a href="{{ route('dashboard') }}" class="nav-link text-white">
                📊 Dashboard
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="{{ route('departments.index') }}" class="nav-link text-white">
                🏢 Departments
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white">
                📂 Categories
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white">
                🚚 Suppliers
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white">
                💻 Assets
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white">
                🔄 Assignments
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white">
                🎫 Tickets
            </a>
        </li>

        <hr>

        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="btn btn-danger w-100">
                    Logout
                </button>
            </form>
        </li>

    </ul>

</div>
