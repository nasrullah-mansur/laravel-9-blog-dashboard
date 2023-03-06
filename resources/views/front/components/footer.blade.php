<!-- footer area start -->
<footer id="footer">
    <div class="container">
      <div class="row f-widget-wrap">
        <div class="col-md-6 col-lg-3">
          <div class="footer-widget">
            <a href="#" class="footer-logo">
              <img src="{{ asset( theme() ? theme()->logo : 'front/images/brand-logo.png' ) }}" alt="Brand Logo" />
            </a>
            <div class="footer-widget-address">
             {!! theme() ? theme()->address : '' !!}
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-2">
          <div class="footer-widget">
            <h5 class="footer-widget-title">Quick Links</h5>
            <ul class="footer-widget-list">
              @foreach (footer_menu() as $footer_menu)
              <li>
                <a class="{{ $footer_menu->class }}" target="{{ $footer_menu->target }}" href="{{ $footer_menu->link }}">{{ $footer_menu->label }}</a>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="footer-widget">
            <h5 class="footer-widget-title">Categories</h5>
            <ul class="footer-widget-list">
              @foreach (category_menu() as $category_menu)
              <li>
                <a class="{{ $category_menu->class }}" target="{{ $category_menu->target }}" href="{{ $category_menu->link }}">{{ $category_menu->label }}</a>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div
            class="footer-widget-wrapper d-flex justify-content-lg-around f-last-widget"
          >
            <div class="footer-widget">
              <h5 class="footer-widget-title">Latest Blog</h5>
              <div class="row">
                @foreach (latest_blog_gall() as $latest_blog_gall)
                <div class="col-lg-6 col-md-6 col-sm-6 mb">
                  <a class="d-block" href="">
                    <img src="{{ asset($latest_blog_gall->image) }}" alt="{{ $latest_blog_gall->title }}">
                  </a>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer area end -->