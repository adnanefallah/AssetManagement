<?php

namespace App\Http\Controllers\Dashboard;

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
        // ============================
        // User Dashboard
        // ============================
        if (auth()->user()->isUser()) {

            return view('dashboard', [

                'totalUsers' => 0,
                'totalDepartments' => 0,
                'totalCategories' => 0,
                'totalSuppliers' => 0,

                'totalAssets' => AssetAssignment::where('user_id', auth()->id())->count(),

                'totalAssignments' => AssetAssignment::where('user_id', auth()->id())->count(),

                'totalTickets' => Ticket::where('user_id', auth()->id())->count(),

                'totalMaintenances' => 0,

                'availableAssets' => 0,
                'assignedAssets' => 0,
                'maintenanceAssets' => 0,
                'warrantySoon' => 0,
                'retiredAssets' => 0,

                'assetStatus' => [],
                'categoryLabels' => [],
                'categoryCounts' => [],
            ]);
        }

        // ============================
        // Administrator & Technician
        // ============================

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

            'warrantySoon' => Asset::whereNotNull('warranty_end')
                ->whereBetween('warranty_end', [
                    now(),
                    now()->addDays(30),
                ])
                ->count(),

            'retiredAssets' => Asset::where('status', 'Retired')->count(),

            'assetStatus' => $assetStatus,

            'categoryLabels' => $categoryLabels,

            'categoryCounts' => $categoryCounts,
        ]);
    }
}
