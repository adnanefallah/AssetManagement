<?php

namespace App\Http\Controllers;

use App\Mail\AssetAssignedMail;
use App\Models\Asset;
use App\Models\AssetAssignment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AssetAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assignments = AssetAssignment::with(['asset', 'user'])
            ->latest()
            ->paginate(10);

        return view('asset_assignments.index', compact('assignments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $assets = Asset::orderBy('asset_name')->get();
        $users = User::orderBy('name')->get();

        return view('asset_assignments.create', compact('assets', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'user_id' => 'required|exists:users,id',
            'assigned_date' => 'required|date',
            'status' => 'required',
        ]);

        $assignment = AssetAssignment::create($request->all());

        $assignment->load(['asset', 'user']);

        Mail::to($assignment->user->email)
            ->send(new AssetAssignedMail($assignment));

        return redirect()
            ->route('asset-assignments.index')
            ->with('success', 'Asset assigned successfully. Email notification sent.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AssetAssignment $assetAssignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssetAssignment $assetAssignment)
    {
        $assets = Asset::orderBy('asset_name')->get();
        $users = User::orderBy('name')->get();

        return view('asset_assignments.edit', compact(
            'assetAssignment',
            'assets',
            'users'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AssetAssignment $assetAssignment)
    {
        $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'user_id' => 'required|exists:users,id',
            'assigned_date' => 'required|date',
            'returned_date' => 'nullable|date',
            'status' => 'required',
        ]);

        $assetAssignment->update($request->all());

        return redirect()
            ->route('asset-assignments.index')
            ->with('success', 'Assignment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssetAssignment $assetAssignment)
    {
        $assetAssignment->delete();

        return redirect()
            ->route('asset-assignments.index')
            ->with('success', 'Assignment deleted successfully.');
    }
}
