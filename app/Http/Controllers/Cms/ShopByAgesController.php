<?php

namespace App\Http\Controllers\Cms;

use App\Models\Cms\Banner;
use App\Models\Cms\ShopByAge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CMS\BannersRepository;

class ShopByAgesController extends Controller
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
  public function index(Request $request)
  {
    $shopByAgesSingle = ShopByAge::where('id',$request->age_id)->first();
    $shopByAges = ShopByAge::get();
    return view('cms.shopByAges.shopByAges', compact('shopByAges','shopByAgesSingle'));
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
    $saveAge = new ShopByAge();
    if(!empty($request->age_id)){
      $saveAge =  ShopByAge::find($request->age_id);  
    }
     $saveAge->title = $request->title;
     $saveAge->url = $request->url;
     $saveAge->position = $request->position;
     $saveAge->save();
     
  return redirect('/admin/shop-by-ages')->with('success', 'Ages created successfully');

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
  public function edit($request)
  {
    $banner = ShopByAge::where('id',$id)->first();
    $shopByAges = ShopByAge::get();
    return view('cms.shopByAges.shopByAges', compact('banner','shopByAges'));
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
  public function destroy(Request $request)
  {
    if(!empty($request->age_id)){
      $saveAge =  ShopByAge::find($request->age_id); 
      $saveAge->delete(); 
    }
    
  return redirect('/admin/shop-by-ages')->with('success', 'Ages Deleted successfully');
  }
}
