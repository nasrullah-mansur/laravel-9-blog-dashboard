@extends('front.leyout.layout')

@push('page_css')
    <link rel="stylesheet" href="{{asset('front/css/pages/index.css')}}">
@endpush

@push('page_plugin_css')
<link rel="stylesheet" href="{{ asset('front/css/slick.css') }}" />
@endpush

@push('page_plugin_js')
<script src="{{ asset('front/js/slick.min.js') }}"></script>
@endpush

@section('content')
<!-- Banner start -->
<section class="home-banner">
  <div class="left-sidebar">
      <div class="sidebar-img">
          <img src="{{ asset('front/images/brain-small.png') }}" alt="img" />
          <span>BARAIN & SPINE</span>
      </div>
      <div class="border-style"></div>
      <div class="sidebar-list">
          <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">Expertise</a></li>
              <li><a href="#">Explore</a></li>
              <li><a href="#">Training</a></li>
              <li><a href="#">Award</a></li>
              <li><a href="#">Appointment</a></li>
              <li><a href="#">Contact</a></li>
          </ul>
      </div>
      <div class="border-style"></div>
      <div class="sidebar-social">
          <ul>
              <li>
                  <a href="#"><img src="{{ asset('front/images/fb.png') }}" alt="img" /></a>
              </li>
              <li>
                  <a href="#"><img src="{{ asset('front/images/linkedin.png') }}" alt="img" /></a>
              </li>
              <li>
                  <a href="#"><img src="{{ asset('front/images/youtube.png') }}" alt="img" /></a>
              </li>
              <li>
                  <a href="#"><img src="{{ asset('front/images/google.png') }}" alt="img" /></a>
              </li>
              <li>
                  <a href="#"><img src="{{ asset('front/images/twitter.png') }}" alt="img" /></a>
              </li>
          </ul>
      </div>
  </div>
  <div class="container">
      <div class="row align-items-center">
          <div class="col-lg-6">
              <div class="img img-fluid">
                  <img src="{{ asset($banner ? $banner->image : 'front/images/dr.png') }}" alt="{{ theme() ? theme()->admin_name : '' }}" />
              </div>
          </div>
          <div class="col-lg-6">
              <div class="text">
                  <h1>{{ $banner ? $banner->title : 'Dr. Md. Gaousul Azam' }}</h1>
                  {!! $banner ? $banner->content : '' !!}
                  <a href="{{ $banner ? $banner->btn_link : '#' }}">{{ $banner ? $banner->btn_label : 'Know More' }}</a>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Banner end -->

<!-- Service start -->
<section class="home-service">
  <div class="container">
      <div class="section-title">
          <h2 class="text-center pb-5">Specialties include</h2>
      </div>
      <div class="row">
        @foreach ($specials as $special)
        <div class="col-lg-4 col-md-6">
            <a href="{{ $special->link }}">
                <div class="service-item">
                    <img src="{{ asset($special->image) }}" alt="{{ $special->title }}" />
                    <h4>{{ $special->title }}</h4>
                </div>
            </a>
        </div>
        @endforeach
      </div>
  </div>
</section>
<!-- Service end -->

<!-- Explore start -->
<section class="home-explore">
  <div class="container">
      <div class="explore-title">
          <h2>Explore Your Knowledge</h2>
      </div>
      <div class="row">
        @foreach ($videos as $video)
        <div class="col-lg-6">
            <div class="img">
                <div class="ratio ratio-16x9">
                    {!! $video->iframe_link !!}
                </div>
            </div>
        </div>
        @endforeach
      </div>
  </div>
</section>
<!-- Explore end -->

<!-- Story start -->
<section class="home-story" style="background-image: url(https://drgaousulazam.com/public/front/images/backgraund-testimonial.jpg) ">
  <div class="container">
      <div class="testimonial-slider-wrapper" >
        @foreach ($testimonials as $testimonial)
        <div class="story-content">
          <div class="img">
              <img class="img-fluid w-100" src="{{ asset($testimonial->image) }}" alt="{{$testimonial->title}}">
          </div>
          <div class="text">
              <div class="content">
                  <h2>{{ $testimonial->title }}</h2>
                  <span>{{ $testimonial->subtitle }}</span>
                  <p>{!! $testimonial->description !!}</p>
                  <a href="{{ $testimonial->btn_link }}">{{ $testimonial->btn_text }}</a>
              </div>
          </div>
        </div>
        @endforeach
      
      </div>
  </div>
</section>
<!--Story end -->

<!-- Training start -->
<section class="home-training">
  <div class="container-fluid">
      <div class="section-title text-center">
          <h2 class="pb-5">Training</h2>
      </div>
      <div class="training-content">
        @foreach ($trainings as $training)
        <div class="item">
            <img src="{{ asset($training->image) }}" alt="{{$training->title}}" />
            <h4>{{ $training->title }}</h4>
            <p>
                {!! $training->description !!}
            </p>
        </div>
        @endforeach
      </div>
  </div>
</section>
<!-- Training end -->

<!-- Awards start -->
<section class="home-awards">
  <div class="section-title container">
      <h2 class="text-center text-uppercase pb-5 text-white">
          Awards
      </h2>
  </div>
  <div class="award-content">
      <div class="awards-slider">
        @foreach ($awards as $award)
        <div class="item">
            <img src="{{ asset($award->image) }}" alt="{{$award->title}}" />
            
        </div>
        @endforeach
      </div>
  </div>
</section>
<!-- Awards end -->

<!-- Contact start -->
<section class="home-contact">
  <div class="container">
      <div class="row">
          <div class="col-lg-6">
              <div class="text">
                  <div class="section-title">
                      <span> Contact Us</span>
                      <h2>{{ contact_section() ? contact_section()->section_title : '' }}</h2>
                  </div>
                  <div class="locations">
                      <ul>
                        @foreach ($chambers as $chamber)
                        <li>
                            <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                            <h5>{{ $chamber->chamber_name }}</h5>
                            <p>{{ $chamber->address }}</p>
                            <p><strong>Chamber time:</strong> {{$chamber->time}} (
                                @foreach ($chamber->days as $cd)
                                    {{$cd->day}}
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            )</p>
                            @if ($chamber->google_location)
                            <a target="_blank" style="color: #f74d6c;" href="{{$chamber->google_location}}"><i class="far fa-map"></i> Google Map Location</a>
                            @endif
                        </li>
                        @endforeach
                      </ul>
                  </div>
                  <h4>Contact Us for an Appointment</h4>
                  <ul class="direct-contact">
                    @foreach ($chambers as $chamber_n)
                      <li>
                          <a href="tel:{{$chamber_n->serial_number}}">
                              <i class="fas fa-phone-alt"></i>
                              <span>{{$chamber_n->serial_number}}</span>
                          </a>
                      </li>
                      @endforeach
                                            
                  </ul>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="form">
                  <div class="section-title">
                      <h2>{{contact_section() ? contact_section()->form_title : 'Send Us a Message' }}</h2>
                      @if (contact_section())
                      <p>{{ contact_section()->form_description }}</p>
                      @endif
                      @if (Session::has('success'))
                        <p style="color: #f74d6c;" class="pb-2 mb-0">{{ Session::get('success') }}</p>
                    @endif
                  </div>
                  <form action="{{ route('user.contact.store')}}" method="POST">
                    @csrf
                      <div class="input-content">
                          <div class="input-item w-h">
                              <input type="text" placeholder="First name" name="first_name">
                              @if ($errors->has('first_name'))
                                  <small class="text-danger">{{ $errors->first('first_name') }}</small>
                              @endif
                          </div>
                          <div class="input-item w-h">
                              <input type="text" placeholder="Last name" name="last_name">
                              @if ($errors->has('last_name'))
                                  <small class="text-danger">{{ $errors->first('last_name') }}</small>
                              @endif
                          </div>
                          <div class="input-item">
                              <input type="email" placeholder="Your email" name="email">
                              @if ($errors->has('email'))
                                  <small class="text-danger">{{ $errors->first('email') }}</small>
                              @endif
                          </div>
                          <div class="input-item">
                              <input type="text" placeholder="Your phone" name="phone">
                              @if ($errors->has('phone'))
                                  <small class="text-danger">{{ $errors->first('phone') }}</small>
                              @endif
                          </div>
                          <div class="input-item">
                              <input type="text" placeholder="Your subject" name="subject">
                              @if ($errors->has('subject'))
                                  <small class="text-danger">{{ $errors->first('subject') }}</small>
                              @endif
                          </div>
                          <div class="input-item">
                              <textarea name="message" placeholder="Leave us a message and we will get back in touch with you right away."></textarea>
                              @if ($errors->has('message'))
                                  <small class="text-danger">{{ $errors->first('message') }}</small>
                              @endif
                          </div>
                          <div class="submit-area">
                              <button type="submit">SUBMIT</button>
                          </div>
                         
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Contact end -->
@endsection