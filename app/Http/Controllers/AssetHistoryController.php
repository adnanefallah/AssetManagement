<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetHistoryController extends Controller
{
    /**
     * Display the history for an asset.
     */
    public function index(Asset $asset)
    {
        $histories = $asset->histories()->latest()->get();

        return view('asset_histories.index', compact(
            'asset',
            'histories'
        ));
    }
}
