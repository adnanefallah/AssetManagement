<?php

namespace App\Exports;

use App\Models\Asset;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AssetsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Asset::with(['category', 'supplier'])
            ->get()
            ->map(function ($asset) {

                return [

                    $asset->asset_code,
                    $asset->asset_name,
                    $asset->serial_number,
                    $asset->category?->category_name,
                    $asset->supplier?->company_name,
                    $asset->status,
                    $asset->location,

                ];

            });
    }

    public function headings(): array
    {
        return [

            'Asset Code',
            'Asset Name',
            'Serial Number',
            'Category',
            'Supplier',
            'Status',
            'Location',

        ];
    }
}
