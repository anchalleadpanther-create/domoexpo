<?php

namespace App\Http\Controllers\Extensions;

use Illuminate\Http\Request;
use App\Models\Extensions\Media;
use App\Http\Controllers\Controller;
use App\Http\Requests\Extensions\MediaRequest;
use App\Repositories\Extensions\MediaRepository;

class MediaController extends Controller
{
  public function __construct(MediaRepository $MediaRepository)
  {
    $this->MediaRepository = $MediaRepository;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $medias = Media::all();
    return view('extensions.all-media', compact('medias'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('extensions.create-media');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(MediaRequest $request)
  {
    $this->MediaRepository->store($request);
    return redirect()->route('admin.media.index')->with('success', 'New media file has been added.'); 
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Extensions\Media  $media
   * @return \Illuminate\Http\Response
   */
  public function show(Media $media)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Extensions\Media  $media
   * @return \Illuminate\Http\Response
   */
  public function edit(int $id)
  {
    $media = Media::find($id);
    return view('extensions.create-media', compact('media'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Extensions\Media  $media
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, int $id)
  {
    $this->MediaRepository->update($request, $id);
    return redirect()->route('admin.media.index')->with('success', 'Media file has been updated.');
  }

  public function toggleStatus(int $id, int $status)
  {
    $this->MediaRepository->toggleStatus($id, $status);
    return back()->with('success', 'Media status has been changed.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Extensions\Media  $media
   * @return \Illuminate\Http\Response
   */
  public function destroy(int $id)
  {
    Media::find($id)->delete();
    return redirect()->route('admin.media.index')->withErrors('Media file has been deleted.');
  }
}
