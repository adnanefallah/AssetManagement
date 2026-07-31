<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'asset_id',
        'title',
        'description',
        'maintenance_date',
        'cost',
        'status',
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
