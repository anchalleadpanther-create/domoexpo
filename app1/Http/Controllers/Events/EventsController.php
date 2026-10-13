<?php

namespace App\Http\Controllers\Events;

use App\Models\Event;
use Illuminate\View\View;
use App\Traits\FileUpload;
use Illuminate\Support\Str;
use App\Models\EventRegistration;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Event\EventRequest;
use App\Models\EventExhibitorRegistration;

class EventsController extends Controller
{
  use FileUpload;
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(): View
  {
    $events = Event::orderByDesc('id')->paginate(100);
    return view('events.index', compact('events'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(): View
  {
    return view('events.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(EventRequest $request): RedirectResponse
  {
    $this->handleFiles($request);
    $images = [];
    if ($request->hasfile('gallery_images'))
      $images  = $this->handleMultiFileUpload($request, 'gallery_images', 'uploads/events', 10, true);

    Event::create($request->except(['icon_file', 'banner_file']) + ['slug' => Str::slug($request->title), 'images' => $images]);
    return redirect()->route('admin.events.index')->with('success', 'Event has been successfully created!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Event  $event
   * @return \Illuminate\Http\Response
   */
  public function show(Event $event)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Event  $event
   * @return \Illuminate\Http\Response
   */
  public function edit(Event $event): View
  {
    return view('events.create', compact('event'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Event  $event
   * @return \Illuminate\Http\Response
   */
  public function update(EventRequest $request, Event $event): RedirectResponse
  {
    $this->handleFiles($request);

    $images = [];
    if ($request->hasfile('gallery_images'))
      $images  = $this->handleMultiFileUpload($request, 'gallery_images', 'uploads/events', 10, true);

    $event->update($request->except(['icon_file', 'banner_file']) + ['slug' => Str::slug($request->title), 'images' => empty($images) ? $event->images : $images]);
    return redirect()->route('admin.events.index')->with('success', 'Event has been successfully updated!');
  }

  public function toggleStatus(int $id, int $status): RedirectResponse
  {
    Event::find($id)->update(['status' => $status]);
    return back()->with('success', 'Event status has been changed.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Event  $event
   * @return \Illuminate\Http\Response
   */
  public function destroy(Event $event)
  {
    $event->delete();
    return back()->withErrors('Event has been successfully destroyed!');
  }

  private function handleFiles($request): void
  {
    if ($request->hasfile('icon_file'))
      $request->request->add(['icon' => $this->handleSingleFileUpload($request->icon_file, 'uploads/events/')]);

    if ($request->hasfile('banner_file'))
      $request->request->add(['banner' => $this->handleSingleFileUpload($request->banner_file, 'uploads/events/')]);
  }

  public function registrations(): View
  {
    $registrations = EventRegistration::orderByDesc('id')->paginate(100);
    return view('events.event-registrations', compact('registrations'));
  }

  public function exhibitorRegistrations(): View
  {
    $registrations = EventExhibitorRegistration::orderByDesc('id')->paginate(100);
    return view('events.event-exhibitor-registrations', compact('registrations'));
  }
}
