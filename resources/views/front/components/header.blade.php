
  <!-- Header start -->
  <header class="home-header">
      @if (contact_section())
    <div class="top">
        <ul>
            <li>
                <a href="tel:{{contact_section()->phone}}"><i class="fas fa-phone-alt"></i> {{contact_section()->phone}}</a>
            </li>
            <li>
                <a href="mailto:{{contact_section()->email}}"><i class="far fa-envelope"></i> {{contact_section()->email}}</a>
            </li>
        </ul>
    </div>
    @endif
    <div class="main-menu">
        <div class="container-fluid">
            <div class="menu-content">
                <div class="logo">
                    <a href="{{ url('/') }}">
                      <img src="{{ asset(logo()) }}" alt="{{ theme() ? theme()->theme_name : '' }}" />
                    </a>
                </div>
                <div class="list">

                    <ul>
                      @foreach (main_menu() as $menu)
                        <li {{ $menu->class ? $menu->class : '' }}>
                          <a target="{{ $menu->target }}" href="{{ $menu->slug }}">{{ $menu->label }} @if($menu->menuItem->count() != 0) <i class="fas fa-chevron-down"></i>@endif</a>
                          @if ($menu->menuItem->count() != 0)
                          <ul>
                            @foreach ($menu->menuItem as $submenu)
                              <li {{ $submenu->class ? $submenu->class : '' }}>
                                <a target="{{ $submenu->target }}" href="{{ $submenu->slug }}">{{ $submenu->label }}</a>
                              </li>
                              @endforeach
                            </ul>
                            @endif
                          </li>
                        @endforeach
                    </ul>
                </div>
                <div class="account">
                    <ul>
                        <li>
                            @if (Auth::guard('web')->check())
                            <a class="login" href="{{route('user.profile')}}"><span>Profile</span></a>
                            @elseif(Auth::guard('admin')->check())
                            <a class="login" href="{{route('dashboard')}}"><span>Dashboard</span></a>
                            @else
                            <a class="login" href="{{route('login')}}"><span>Login</span></a>
                            @endif
                        </li>
                        <li>
                            <a class="appointment" href="#">
                                <span>Book An Appointment</span>
                                <span class="icon"><i class="fas fa-chevron-right"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="mobile">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header end -->