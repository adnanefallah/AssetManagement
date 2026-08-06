<?php

namespace App\Http\Controllers\Logs;

use App\Http\Controllers\Controller;
use App\Models\Asset;

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
