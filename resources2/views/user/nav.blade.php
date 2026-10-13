<!-- Mobile menu toggle button (hamburger/x icon) -->
<input id="main-menu-state" type="checkbox" />
<label class="main-menu-btn" for="main-menu-state">
  <span class="main-menu-btn-icon"></span> Toggle main menu visibility
</label>
<!-- Sample menu definition -->
<ul id="main-menu" class="sm sm-blue dark-purple">
  @if (Auth::user()->type !== 'sub_admin')
    @php $menuArray = []; @endphp
    @foreach ($navMenus as $menu)
      @if (!in_array($menu->main_parent_id, $menuArray))
        @php array_push($menuArray, $menu->main_parent_id); @endphp
        <li>
          <a href="javascript:;">
            <i class="{{ $menu->parent_icon }}"></i>
            {{ $menu->menu_name_parent }}
          </a>
          <ul>
            @foreach ($navMenus as $submenu)
              @if ($submenu->child_parent_id === $menu->main_parent_id)
                <li>
                  <a href="{{ $submenu->menu_url_child }}">
                    <i class="icon-Commit">
                      <span class="path1"></span>
                      <span class="path2"></span>
                    </i>
                    {{ $submenu->menu_name_child }}
                  </a>
                </li>
              @endif
            @endforeach
          </ul>
        </li>
      @endif
    @endforeach
  @else
    @foreach ($navMenuSubAdmin as $menu)
      @if (in_array($menu->id, Auth::user()->permission->permissions))
        <li>
          <a href="javascript:;">
            <i class="{{ $menu->menu_icon }}"></i>
            {{ $menu->menu_name }}
          </a>
          <ul>
            @foreach ($menu->children as $subMenu)
              @if ($subMenu->child_parent_id === $menu->main_parent_id)
                @if (in_array($subMenu->id, Auth::user()->permission->permissions))
                  <li>
                    <a href="{{ $subMenu->menu_url }}">
                      <i class="icon-Commit">
                        <span class="path1"></span>
                        <span class="path2"></span>
                      </i>
                      {{ $subMenu->menu_name }}
                    </a>
                  </li>
                @endif
              @endif
            @endforeach
          </ul>
        </li>
      @endif
    @endforeach
  @endif
</ul>
