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

class DashboardController extends Controller
{
    public function index()
    {
        $assetStatus = [
            Asset::where('status', 'Available')->count(),
            Asset::where('status', 'Assigned')->count(),
            Asset::where('status', 'Maintenance')->count(),
            Asset::where('status', 'Retired')->count(),
        ];

        $categoryLabels = Category::pluck('category_name');

        $categoryCounts = Category::withCount('assets')
            ->get()
            ->pluck('assets_count');

        return view('dashboard', [
            'totalUsers' => User::count(),
            'totalDepartments' => Department::count(),
            'totalCategories' => Category::count(),
            'totalSuppliers' => Supplier::count(),
            'totalAssets' => Asset::count(),
            'totalAssignments' => AssetAssignment::count(),
            'totalTickets' => Ticket::count(),
            'totalMaintenances' => Maintenance::count(),

            'availableAssets' => Asset::where('status', 'Available')->count(),
            'assignedAssets' => Asset::where('status', 'Assigned')->count(),
            'maintenanceAssets' => Asset::where('status', 'Maintenance')->count(),
            'retiredAssets' => Asset::where('status', 'Retired')->count(),

            'assetStatus' => $assetStatus,
            'categoryLabels' => $categoryLabels,
            'categoryCounts' => $categoryCounts,
        ]);
    }
}
