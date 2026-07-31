<?php

namespace App\Helpers;

use App\Models\AssetHistory;

class AssetHistoryLogger
{
    public static function log($assetId, $action, $description = null)
    {
        AssetHistory::create([
            'asset_id' => $assetId,
            'action' => $action,
            'description' => $description,
        ]);
    }
}
