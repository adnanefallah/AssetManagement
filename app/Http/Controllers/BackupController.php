<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class BackupController extends Controller
{
    /**
     * Display all backups.
     */
    public function index()
    {
        $files = collect(Storage::disk('local')->files('Laravel'))
            ->filter(function ($file) {
                return str_ends_with($file, '.zip');
            })
            ->sortDesc()
            ->values();

        return view('backups.index', compact('files'));
    }

    /**
     * Create a new backup.
     */
    public function create()
    {
        Artisan::call('backup:run');

        return redirect()
            ->route('backups.index')
            ->with('success', 'Backup created successfully.');
    }

    /**
     * Download a backup.
     */
    public function download(string $file): StreamedResponse
    {
        return Storage::disk('local')->download(
            'Laravel/' . $file
        );
    }

    /**
     * Delete a backup.
     */
    public function destroy(string $file)
    {
        Storage::disk('local')->delete(
            'Laravel/' . $file
        );

        return redirect()
            ->route('backups.index')
            ->with('success', 'Backup deleted successfully.');
    }
}
