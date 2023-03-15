
  <!-- Header start -->
  <header class="home-header">
    <div class="top">
        <ul>
            <li>
                <a href="tel:+880 1751618072"><i class="fas fa-phone-alt"></i> +880 1751618072</a>
            </li>
            <li>
                <a href="mailto:zahed.eee@gmail.com"><i class="far fa-envelope"></i> zahed.eee@gmail.com</a>
            </li>
        </ul>
    </div>
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
                            <a class="login" href="{{route('login')}}"><span>Login</span></a>
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