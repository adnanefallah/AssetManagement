<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Mail\TicketCreatedMail;
use App\Models\Asset;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->isUser()) {

            $tickets = Ticket::with(['asset', 'user'])
                ->where('user_id', auth()->id())
                ->latest()
                ->paginate(10);

        } else {

            $tickets = Ticket::with(['asset', 'user'])
                ->latest()
                ->paginate(10);

        }

        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->isUser()) {

            $assets = Asset::whereHas('assignments', function ($query) {

                $query->where('user_id', auth()->id())
                    ->where('status', 'Assigned');

            })->orderBy('asset_name')->get();

            $users = collect();

        } else {

            $assets = Asset::orderBy('asset_name')->get();
            $users = User::orderBy('name')->get();

        }

        return view('tickets.create', compact('assets', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->isUser()) {

            $request->merge([
                'user_id' => auth()->id(),
            ]);

        }

        $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'user_id' => 'required|exists:users,id',
            'title' => 'required|max:255',
            'description' => 'required',
            'priority' => 'required',
            'status' => 'required',
        ]);

        $ticket = Ticket::create($request->all());

        $ticket->load(['asset', 'user']);

        Mail::to($ticket->user->email)
            ->send(new TicketCreatedMail($ticket));

        return redirect()
            ->route('tickets.index')
            ->with('success', 'Ticket created successfully. Email notification sent.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        $assets = Asset::orderBy('asset_name')->get();
        $users = User::orderBy('name')->get();

        return view('tickets.edit', compact(
            'ticket',
            'assets',
            'users'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'user_id' => 'required|exists:users,id',
            'title' => 'required|max:255',
            'description' => 'required',
            'priority' => 'required',
            'status' => 'required',
        ]);

        $ticket->update($request->all());

        return redirect()
            ->route('tickets.index')
            ->with('success', 'Ticket updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()
            ->route('tickets.index')
            ->with('success', 'Ticket deleted successfully.');
    }
}
