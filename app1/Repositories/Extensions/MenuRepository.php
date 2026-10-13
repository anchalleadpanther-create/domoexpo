<?php

namespace App\Repositories\Extensions;

use Illuminate\Http\Request;
use App\Models\Extensions\Menu;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;

class MenuRepository extends BaseRepository
{
  public function store($request)
  {
    if ($request->hasfile('menu_files')) :
      $request->request->add(['menu_icon' => $this->handleSingleFileUpload($request->menu_files, 'uploads/menu/')]);
    endif;

    return Menu::insert($request->except('_token', 'menu_files'));
  }

  public function update($request, int $id)
  {
    if ($request->type === 'sort-update') :
      foreach ($request->id as $key => $id) :
        Menu::where('id', '=', $id)->update(['sort' => $request->sort[$key]]);
      endforeach;
      return 'Dropdown sort numbers has been updated successfully!';

    elseif ($request->type === 'normal-update') :
      if ($request->hasfile('menu_files')) :
        $request->request->add(['menu_icon' => $this->handleSingleFileUpload($request->menu_files, 'uploads/menu/')]);
      endif;

      Menu::where('id', '=', $id)->update($request->except('_method', '_token', 'type', 'menu_files'));
      return 'Dropdown has been updated successfully!';
    endif;
  }
}
