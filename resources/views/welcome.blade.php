@extends('front.leyout.layout')

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
                      <span>Contact Us</span>
                      <h2>Dr. Gaousul Azam</h2>
                  </div>
                  <div class="locations">
                      <ul>
                          <li>
                              <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                              <h5>Chamber 1</h5>
                              <p>Bangladesh Centre for Rehabilitation (BCR) 234/C (2nd Floor), Kantaban Mor, New Elephant Road, Dhaka - 1205.</p>
                              <p><strong>Chamber time:</strong> 3 PM to 8 PM (Saturday, Monday, Wednesday)</p>
                              <a target="_blank" style="color: #f74d6c;" href="https://maps.app.goo.gl/87UA4g58Y1A6DQmw7"><i class="far fa-map"></i> Google Map Location</a>
                          </li>
                          <li>
                              <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                              <h5>Chamber 2</h5>
                              <p>Hi-Care Cardiac and Neuro Specialist Hospital (Room No-206) House No-23, Lake Drive Road, Sector No-7, Uttara Model Town, Dhaka - 1230</p>
                              <p><strong>Chamber time:</strong> 3 PM to 7 PM (Sunday & Tuesday)</p>
                              
                          </li>
                          
                      </ul>
                  </div>
                  <h4>Contact Us for an Appointment</h4>
                  <ul class="direct-contact">
                      <li>
                          <a href="tel:+8801320766504">
                              <i class="fas fa-phone-alt"></i>
                              <span>+88 01320766504</span>
                          </a>
                      </li>
                      <li>
                          <a href="tel:+8801882580286">
                              <i class="fas fa-phone-alt"></i>
                              <span>+88 01882580286</span>
                          </a>
                      </li>
                      
                  </ul>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="form">
                  <div class="section-title">
                      <h2>Send Us a Message</h2>
                      <p>Looking for help with your neck or back pain or injury? Send us a message below or give us a call at +88 01320766504.</p>
                  </div>
                  <div class="input-content">
                      <div class="input-item w-h">
                          <input type="text" placeholder="First name">
                      </div>
                      <div class="input-item w-h">
                          <input type="text" placeholder="Last name">
                      </div>
                      <div class="input-item">
                          <input type="text" placeholder="Your email">
                      </div>
                      <div class="input-item">
                          <input type="text" placeholder="Your phone">
                      </div>
                      <div class="input-item">
                          <textarea placeholder="Leave us a message and we will get back in touch with you right away."></textarea>
                      </div>
                      <div class="submit-area">
                          <button type="submit">SUBMIT</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Contact end -->
@endsection