<?php

namespace App\Providers;

use App\Models\Ad\AdCategory;
use App\Models\Extensions\Menu;
use App\Models\Ecommerce\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Service\ServiceCategory;
use Illuminate\Support\ServiceProvider;
use App\Models\Extensions\FooterCategory;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    ini_set('memory_limit', '5000M');
    Paginator::useBootstrapFive();

    View::composer('user.header', function ($view) {
      $view->with('navMenus', DB::table('cpr_menus as A')
        ->join('cpr_menus as B', 'A.id', '=', 'B.parent_id')
        ->where([
          ['A.status', '=', 1], ['B.status', '=', 1]
        ])
        ->orderBy('A.sort')
        ->orderBy('B.sort')
        ->select('A.menu_name AS menu_name_parent', 'A.id AS main_parent_id', 'B.menu_name AS menu_name_child', 'B.parent_id AS child_parent_id', 'B.menu_url AS menu_url_child', 'A.menu_icon as parent_icon')
        ->get());
      $view->with('navMenuSubAdmin', Menu::where([['parent_id', '=', 0], ['status', '=', 1]])->get());
    });

    if ($this->app->environment('local')) {
      $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
      $this->app->register(TelescopeServiceProvider::class);
    }
  }
}
