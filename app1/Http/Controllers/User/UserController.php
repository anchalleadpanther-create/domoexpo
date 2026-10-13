<?php

namespace App\Http\Controllers\User;

use App\Models\Buyer\Cart;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Extensions\Menu;
use App\Models\Ecommerce\Product;
use App\Http\Controllers\Controller;
use App\Repositories\DashboardRepository;

class UserController extends Controller
{

  protected $DashboardRepository;

  public function __construct(DashboardRepository $DashboardRepository)
  {
    $this->DashboardRepository = $DashboardRepository;
  }
  /** 
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function patch(): bool
  {
    // $menus = Menu::all();
    // foreach ($menus as $menu) {
    //   $menu->menu_url =
    //     Str::replace('https://tfe.webkype.co/admin/', 'http://localhost/tfe/admin/', $menu->menu_url);
    //   $menu->save();
    // }
    // \Artisan::call('config:cache');
    // $products = Product::where([
    //   ['parent_id', '!=', 0],
    // ])->doesntHave('parentProduct')->delete();
    // dd($products);
    return true;
  }

  public function index(Request $request)
  {
    // $this->patch();
    $orders = Cart::orderByDesc('id')
      ->where([['order_status', '=', 1], ['status', '=', 0]])
      ->limit(5)
      ->get();
    $stats = $this->DashboardRepository->getDashboardStats($request);
    return view('user.dashboard', compact('stats', 'orders'));
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
  public function store(Request $request)
  {
    //
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
  public function update(Request $request, $id)
  {
    //
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
