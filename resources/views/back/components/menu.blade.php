<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        
        <li class=" nav-item {{ Route::is('blog.*') ? 'active open' : '' }}">
          <a href="#"><i class="ft-box"></i><span class="menu-title">Blog</span></a>
          <ul class="menu-content">
            <li class="{{ Route::is('blog.index', 'blog.create', 'blog.edit') ? 'active' : '' }}">
                <a class="menu-item" href="{{ route('blog.index') }}">Blogs</a>
            </li>
            <li class="{{ Route::is('blog.category.*') ? 'active' : '' }}">
              <a class="menu-item" href="{{ route('blog.category.index') }}">Categories</a>
            </li>
            <li class="{{ Route::is('blog.tag.*') ? 'active' : '' }}">
              <a class="menu-item" href="{{ route('blog.tag.index') }}">Tags</a>
            </li>
          </ul>
        </li>
        
        <li class=" nav-item {{ Route::is('admin.user.*') ? 'active' : ''}}">
            <a href="{{route('admin.user')}}"><i class="ft-box"></i><span class="menu-title">Users</span></a>
        </li>

        <li class=" nav-item {{ Route::is('appearance.edit') ? 'active' : ''}}">
            <a href="{{route('appearance.edit')}}"><i class="ft-box"></i><span class="menu-title">Appearance</span></a>
        </li>

        <li class=" nav-item {{ Route::is('menu.*', 'menuItem.*') ? 'active' : ''}}">
            <a href="{{route('menu.index')}}"><i class="ft-box"></i><span class="menu-title">Menu</span></a>
        </li>
        
      </ul>
    </div>
  </div>