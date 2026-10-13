<?php

namespace App\Http\Controllers\Ticket;

use Illuminate\Http\Request;
use App\Models\Ticket\Ticket;
use App\Http\Controllers\Controller;
use App\Http\Requests\Ticket\TicketRequest;
use App\Repositories\Ticket\TicketRepository;

class TicketController extends Controller
{
  public function __construct(TicketRepository $TicketRepository)
  {
    $this->TicketRepository = $TicketRepository;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $tickets = Ticket::orderByDesc('id')->limit(5)->get();
    return view('ticket.tickets', compact('tickets'));
  }

  public function newTickets()
  {
    $tickets = Ticket::orderByDesc('id')->where('status', '=', 0)->get();
    return view('ticket.ticket-listing', compact('tickets'));
  }

  public function openTickets()
  {
    $tickets = Ticket::orderByDesc('id')->where('status', '=', 1)->get();
    return view('ticket.ticket-listing', compact('tickets'));
  }

  public function closeTickets()
  {
    $tickets = Ticket::orderByDesc('id')->where('status', '=', 2)->get();
    return view('ticket.ticket-listing', compact('tickets'));
  }

  public function holdTickets()
  {
    $tickets = Ticket::orderByDesc('id')->where('status', '=', 3)->get();
    return view('ticket.ticket-listing', compact('tickets'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(TicketRequest $request)
  {
    $this->TicketRepository->store($request);
    return redirect()->route('admin.tickets.index')->with('success', 'Ticket has been successfully added.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Ticket\Ticket  $ticket
   * @return \Illuminate\Http\Response
   */
  public function show(Ticket $ticket)
  {
    return view('ticket.ticket-details', compact('ticket'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Ticket\Ticket  $ticket
   * @return \Illuminate\Http\Response
   */
  public function edit(Ticket $ticket)
  {
    $tickets = Ticket::orderByDesc('id')->get();
    return view('ticket.tickets', compact('ticket', 'tickets'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Ticket\Ticket  $ticket
   * @return \Illuminate\Http\Response
   */
  public function update(TicketRequest $request, Ticket $ticket)
  {
    $this->TicketRepository->update($request, $ticket->id);
    return redirect()->route('admin.tickets.index')->with('success', 'Ticket has been successfully updated.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Ticket\Ticket  $ticket
   * @return \Illuminate\Http\Response
   */
  public function destroy(Ticket $ticket)
  {
    //
  }
}
