<?php

namespace App\Http\Controllers\Cms;

use App\Models\Cms\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CMS\BannersRepository;

class BannersController extends Controller
{
  protected $BannersRepository;

  public function __construct(BannersRepository $BannersRepository)
  {
    $this->BannersRepository = $BannersRepository;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $banner = Banner::first();
    return view('cms.create-banner', compact('banner'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->BannersRepository->store($request);
    return back()->with('success', 'Banner created successfully');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, int $id)
  {
    $this->BannersRepository->update($request, $id);
    return back()->with('success', 'Banner updated successfully');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
