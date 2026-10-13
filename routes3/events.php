<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Events\EventsController;

Route::middleware(['web', 'auth', 'CheckStatusAndLogout'])->prefix('admin')->name('admin.')->group(function () {
  Route::resource('/events', EventsController::class);
  Route::get('/events/{eventId}/{status}', [EventsController::class, 'toggleStatus'])->name('events.status');
  Route::get('/events-registrations', [EventsController::class, 'registrations'])->name('events.registrations');
  Route::get('/events-exhibitor-registrations', [EventsController::class, 'exhibitorRegistrations'])->name('events.exhibitor-registrations');
});
