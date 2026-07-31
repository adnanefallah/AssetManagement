<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maintenances = Maintenance::with('asset')
            ->latest()
            ->paginate(10);

        return view('maintenances.index', compact('maintenances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $assets = Asset::orderBy('asset_name')->get();

        return view('maintenances.create', compact('assets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'title' => 'required|max:255',
            'description' => 'required',
            'maintenance_date' => 'required|date',
            'cost' => 'required|numeric|min:0',
            'status' => 'required',
        ]);

        Maintenance::create($data);

        return redirect()
            ->route('maintenances.index')
            ->with('success', 'Maintenance created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Maintenance $maintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maintenance $maintenance)
    {
        $assets = Asset::orderBy('asset_name')->get();

        return view('maintenances.edit', compact(
            'maintenance',
            'assets'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        $data = $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'title' => 'required|max:255',
            'description' => 'required',
            'maintenance_date' => 'required|date',
            'cost' => 'required|numeric|min:0',
            'status' => 'required',
        ]);

        $maintenance->update($data);

        return redirect()
            ->route('maintenances.index')
            ->with('success', 'Maintenance updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maintenance $maintenance)
    {
        $maintenance->delete();

        return redirect()
            ->route('maintenances.index')
            ->with('success', 'Maintenance deleted successfully.');
    }
}
