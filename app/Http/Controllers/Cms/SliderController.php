<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomeSliderRequest;
use App\Models\Cms\HomeSlider;
use App\Repositories\CMS\SlidersRepository;
use Illuminate\Http\Request;

class SliderController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  protected $SlidersRepository;

  public function __construct(SlidersRepository $SlidersRepository)
  {
    $this->SlidersRepository = $SlidersRepository;
  }

  public function index($position = null)
  {
    $sliders = HomeSlider::orderBy('sort');
    if (isset($position))
      $sliders = $sliders->where('position', '=', $position);
    $sliders = $sliders->get();
    return view('cms.home-slider', compact('sliders'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $action = route('admin.sliders.store');
    return view('cms.create-home-page-slider', compact('action'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(HomeSliderRequest $request)
  {
    $this->SlidersRepository->storeHomeSlider($request);
    return redirect()->route('admin.sliders.index', 'Main Banner')->with('success', 'Home slider has been added successfully!');
  }

  public function sortUpdate(Request $request)
  {
    $this->SlidersRepository->updateHomeSliderSorting($request);
    return back()->with('success', 'Home sliders sorts have been updated successfully!');
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
    $method = 'PATCH';
    $action = route('admin.sliders.update', [$id]);
    $slider = HomeSlider::find($id);
    return view('cms.create-home-page-slider', compact('action', 'method', 'slider'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $this->SlidersRepository->updateHomeSlider($request, $id);
    return redirect()->route('admin.sliders.index', 'Main Banner')->with('success', 'Home slider has been updated successfully!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    HomeSlider::find($id)->delete();
    return back()->withErrors('Home slider have been deleted successfully!');
  }
}
