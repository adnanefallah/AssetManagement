<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'users' => User::count(),
            'assets' => 0,
            'tickets' => 0,
            'departments' => 0,
        ]);
    }
}
