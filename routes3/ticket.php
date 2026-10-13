<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ticket\TicketController;

Route::middleware(['web', 'auth', 'CheckStatusAndLogout'])->prefix('admin')->name('admin.')->group(function () {

  Route::get('tickets/new', [TicketController::class, 'newTickets'])->name('new-tickets');

  Route::get('tickets/open', [TicketController::class, 'openTickets'])->name('open-tickets');

  Route::get('tickets/close', [TicketController::class, 'closeTickets'])->name('close-tickets');

  Route::get('tickets/hold', [TicketController::class, 'holdTickets'])->name('hold-tickets');

  Route::resources([
    'tickets' => TicketController::class,
  ]);
});
