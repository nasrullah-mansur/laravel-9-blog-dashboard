<!-- header area start -->
<header id="header">
    <div class="container">
      <nav class="navbar navbar-expand-xl justify-content-between">
        <a class="navbar-brand" href="{{url('/')}}">
          <img src="{{ asset(logo()) }}" alt="{{ theme() ? theme()->theme_name : '' }}" />
        </a>

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#nav-menu"
          aria-controls="nav-menu"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div
          class="collapse navbar-collapse justify-content-end"
          id="nav-menu"
        >
          <ul class="navbar-nav">
            @foreach (main_menu() as $menu)
            <li class="nav-item {{ $menu->menuItem->count() != 0 ? 'dropdown' : '' }}">
              <a
                class="nav-link {{ $menu->menuItem->count() != 0 ? 'dropdown-toggle' : '' }} {{ $menu->class ? $submenu->class : '' }}"
                href="{{ $menu->slug }}"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                target="{{ $menu->target }}"
              >
                {{ $menu->label }}
              </a>
              @if ($menu->menuItem->count() != 0)
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach ($menu->menuItem as $submenu)
                <li><a class="dropdown-item {{ $submenu->class ? $submenu->class : '' }}" target="{{ $submenu->target }}" href="{{ $submenu->slug }}">{{ $submenu->label }} </a></li>
                @endforeach
              </ul>
              @endif
            </li>
            @endforeach
          </ul>
        </div>
      </nav>
    </div>
  </header>
  <!-- header area end -->