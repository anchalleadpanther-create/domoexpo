<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cms\HomePageTestimonial;
use App\Repositories\CMS\SlidersRepository;

class TestimonialsController extends Controller
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

  public function index()
  {
    $sliders = HomePageTestimonial::orderBy('sort')->get();
    return view('cms.home-testimonials', compact('sliders'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $action = route('admin.testimonials.store');
    return view('cms.create-home-page-testimonial', compact('action'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->SlidersRepository->storeHomeTestimonial($request);
    return back()->with('success', 'Testimonal has been added successfully!');
  }

  public function sortUpdate(Request $request)
  {
    $this->SlidersRepository->updateHomeTestimonialSorting($request);
    return back()->with('success', 'Testimonals sorts have been updated successfully!');
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
    $action = route('admin.testimonials.update', [$id]);
    $slider = HomePageTestimonial::find($id);
    return view('cms.create-home-page-testimonial', compact('action', 'method', 'slider'));
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
    $this->SlidersRepository->updateHomeTestimonial($request, $id);
    return back()->with('success', 'Testimonals has been updated successfully!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    HomePageTestimonial::find($id)->delete();
    return back()->withErrors('Testimonal have been deleted successfully!');
  }
}
