<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\AssetAssignment;
use App\Models\Category;
use App\Models\Department;
use App\Models\Maintenance;
use App\Models\Supplier;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.reports', [

            // General Statistics
            'users' => User::count(),
            'departments' => Department::count(),
            'categories' => Category::count(),
            'suppliers' => Supplier::count(),
            'assets' => Asset::count(),
            'assignments' => AssetAssignment::count(),
            'tickets' => Ticket::count(),
            'maintenances' => Maintenance::count(),

            // Asset Status Statistics
            'availableAssets' => Asset::where('status', 'Available')->count(),
            'assignedAssets' => Asset::where('status', 'Assigned')->count(),
            'maintenanceAssets' => Asset::where('status', 'Maintenance')->count(),
            'retiredAssets' => Asset::where('status', 'Retired')->count(),

        ]);
    }
}
