<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Operator;

use Illuminate\Http\Request;

// Request
use App\Http\Requests\Ticket\StoreRequest as TicketStoreRequest;
use App\Http\Requests\Ticket\UpdateRequest as TicketUpdateRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::all();

        return view('admin.tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $operators = Operator::all();

        return view('admin.tickets.create', compact('operators'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketStoreRequest $request)
{
    $ticketData = $request->validated();

    // Ottengo gli ID degli operatori che non sono occupati (is_busy == 0)
    $operatorIds = Operator::where('is_busy', 0)->pluck('id')->toArray();

    // Verifico la disponibilità
    if (empty($operatorIds)) {
        // Se non ci sono operatori disponibili, gestisco l'errore come necessario
        return redirect()->back()->withErrors(['error' => 'Non ci sono operatori disponibili.']);
    }

    // Metto 
    $randomOperatorId = $operatorIds[array_rand($operatorIds)];

    $ticket = Ticket::create([
        'title' => $ticketData['title'],
        'description' => $ticketData['description'],
        'operator_id' => $randomOperatorId,
        'status' => 'in attesa',
        'date' => now(),
    ]);

    // Imposto l'operatore come occupato
    $operator = Operator::find($randomOperatorId);
    $operator->is_busy = 1;
    $operator->save();

    return redirect()->route('admin.tickets.show', ['ticket' => $ticket->id]);
}


    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return view('admin.tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        $statusOptions = ['in attesa', 'aperto', 'in lavorazione', 'chiuso'];

        return view('admin.tickets.edit', compact('ticket', 'statusOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TicketUpdateRequest $request, Ticket $ticket)
    {
        $ticketData = $request->validated();

        if ($ticketData['status'] === 'chiuso') {
            $operator = Operator::find($ticket->operator_id);
            
            if ($operator) {
                $operator->is_busy = 0;
                $operator->save();
            }
        }

        $ticket->update([
            'status' => $ticketData['status'],
        ]);

        return redirect()->route('admin.tickets.show', compact('ticket'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {

        $operator = Operator::find($ticket->operator_id);

        if ($operator) {
            $operator->is_busy = 0;
            $operator->save();
        }

        $ticket->delete();

        return redirect()->route('admin.tickets.index');
    }

}
