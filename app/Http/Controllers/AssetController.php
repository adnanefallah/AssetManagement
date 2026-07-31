<?php

namespace App\Http\Controllers;

use App\Exports\AssetsExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Asset;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Asset::with(['category', 'supplier']);

        // Search
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('asset_name', 'like', "%{$search}%")
                    ->orWhere('asset_code', 'like', "%{$search}%")
                    ->orWhere('serial_number', 'like', "%{$search}%");

            });
        }

        // Filter by Category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter by Supplier
        if ($request->filled('supplier')) {
            $query->where('supplier_id', $request->supplier);
        }

        // Filter by Status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $assets = $query->latest()->paginate(10);

        return view('assets.index', [
            'assets' => $assets,
            'categories' => \App\Models\Category::orderBy('category_name')->get(),
            'suppliers' => \App\Models\Supplier::orderBy('company_name')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('category_name')->get();
        $suppliers = Supplier::orderBy('company_name')->get();

        return view('assets.create', compact('categories', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'asset_code'      => 'required|unique:assets',
            'asset_name'      => 'required',
            'serial_number'   => 'required|unique:assets',
            'category_id'     => 'required|exists:categories,id',
            'supplier_id'     => 'nullable|exists:suppliers,id',
            'purchase_date'   => 'nullable|date',
            'warranty_end'    => 'nullable|date',
            'purchase_price'  => 'nullable|numeric',
            'status'          => 'required',
            'location'        => 'nullable',
        ]);

        Asset::create($request->all());

        return redirect()
            ->route('assets.index')
            ->with('success', 'Asset created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset)
    {
        $categories = Category::orderBy('category_name')->get();
        $suppliers = Supplier::orderBy('company_name')->get();

        return view('assets.edit', compact(
            'asset',
            'categories',
            'suppliers'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asset $asset)
    {
        $request->validate([
            'asset_code' => 'required|unique:assets,asset_code,' . $asset->id,
            'asset_name' => 'required',
            'serial_number' => 'required|unique:assets,serial_number,' . $asset->id,
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'purchase_date' => 'nullable|date',
            'warranty_end' => 'nullable|date',
            'purchase_price' => 'nullable|numeric',
            'status' => 'required',
            'location' => 'nullable',
        ]);

        $asset->update($request->all());

        return redirect()
            ->route('assets.index')
            ->with('success', 'Asset updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset)
    {
        $asset->delete();

        return redirect()
            ->route('assets.index')
            ->with('success', 'Asset deleted successfully.');
    }

    public function exportPdf()
    {
        $assets = Asset::with(['category', 'supplier'])
            ->orderBy('asset_name')
            ->get();

        $pdf = Pdf::loadView('assets.pdf', compact('assets'));

        return $pdf->download('assets-report.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(
            new AssetsExport(),
            'assets.xlsx'
        );
    }
}
