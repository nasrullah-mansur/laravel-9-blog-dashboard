@extends('front.leyout.layout')

@section('content')
<!-- banner area start -->
@if($banner)
  <section id="banner" class="section-title">
    <div class="container">
      <div class="banner-area">
        <div class="row">
          <div class="col-lg-6">
            <div class="banner-img banner-bg">
              <img src="{{ asset($banner->image) }}" alt="{{$banner->title}}">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="banner-header">
              <div class="banner-para">
                <h2>{{$banner->title}}</h2>
                <p>{!! $banner->content !!}</p>  
              </div>
            
              <div class="banner-btn">
                <a href="{{$banner->btn_link}}" type="button" class="btn btn-primary">{{ $banner->btn_label }}</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif


  <!-- banner area end -->

  <!-- ===================================== -->

  <!-- playlist area start -->
  <section class="playlist-area" class="section-title">
    <div class="container">
      <div class="section-title">
        <h2>Latest videos you may love</h2>
      </div>
      <div class="row paly-slider play-bg">
        @foreach ($video_galleries as $v_gallery)
        <div class="col-lg-4  play-gap">
          <div class="ratio ratio-16x9">
            {!! $v_gallery->iframe_link !!}
          </div>
        </div>  
        @endforeach
      </div>
    </div>
  </section>
  <!-- playlist area end -->

  <!-- ===================================== -->

  <!-- blogarea start -->
  <div id="blog" class="section-title">
    <div class="container">
      <div class="section-title">
        <h2>Our latest blog for you</h2>
      </div>
      <div class="blog-items-wrapper">
        <div class="row">
          @foreach ($blogs as $blog)
          <div class="col-md-6 col-lg-4">
            <div class="blog-item">
              <div class="blog-image">
                <a href="#">
                  <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}"/>
                </a>
              </div>

              <div class="blog-details">
                <div class="blog-head d-flex">
                  <div class="b-tag">
                    <a href="#">{{ $blog->category->title }}</a>
                  </div>
                  <div class="blog-time ms-auto">
                    <span>{{ $blog->created_at->format('d M Y') }}</span>
                  </div>  
                </div>
                <div class="blog-title">
                  <h2>
                    <a href="#">
                      {{ $blog->title }}
                    </a>  
                  </h2>
                  <p>
                    <div class="break-content">
                      {{ $blog->content }}
                    </div>
                  </p>
                </div>
                <div class="read-btn">
                  <a href="#" type="button" class="btn btn-primary">Read More</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <!-- blogarea end -->

  <!-- ===================================== -->

  <!-- gallery area start -->
  @if ($image_galleries->count() != '0')
  <section id="gallery" class="section-title">
      <div class="gallery-bg">
        <div class="gallery-slider">
          @foreach ($image_galleries as $i_gallery)
          <div class="gallery-image gallery-gap">
            <a href="#">
              <img src="{{ asset('front/images/blog/blog-2.jpg') }}" alt="gallery Img" />
            </a>
          </div>
          @endforeach
      </div>
      </div>
  </section>  
  @endif
  <!-- gallery area end -->
@endsection