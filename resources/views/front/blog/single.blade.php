@extends('front.leyout.layout', [$title = $blog->title])

@section('content')
    <!-- ===================================== -->
      <!-- banner area start -->
      <section id="blog-banner-area">
        <div class="blog-banner-item">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="blog-banner-content">
                  <div class="blog-banner-title">
                    <h3 class="text-center">{{ $blog->title }}</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <!-- banner area end -->
    <!-- ===================================== -->
    <!-- Blog-deatils area start -->
    <section id="blog-details">
      <div class="container">
          <div class="blog-details-area">
            <div class="row">
              <div class="col-lg-8">
                <div class="blog-details-para">
                  <div class="details-head">
                    <div class="blog-heading">
                        <h2>{{ $blog->title }}</h2>
                    </div>
                    <div class="details-date">
                      <a href="#">{{ $blog->category->title }}</a>
                      <span class="time">
                        <i class="fas fa-calendar-week"></i>
                         {{$blog->created_at->format('d M Y')}}
                      </span>
                    </div>
                  </div>
                  <div class="details-image">
                    <img src="{{ asset($blog->image) }}" alt="{{$blog->title}}" />
                  </div>
                  <div class="blog-box">
                    <p>{!! $blog->content !!}</p>

                    {!! $blog->details !!}
                    
                    <div class="details-tag">
                        @foreach ($blog->tags as $tag_1)
                        <a href="#">#{{ $tag_1->title }}</a>
                        @endforeach
                      
                    </div>
                    <div class="details-pagenation">
                      <div class="row">
                        @if ($previous_blog)
                        <div class="col-lg-6 col-md-6">
                          <div class="prev">
                            <span>Previous Post</span>
                            <p>
                              <a href="{{ route('single.blog', $previous_blog->slug) }}">
                                {{ $previous_blog->title }}				
                              </a>
                            </p>
                          </div>    
                        </div>
                        @endif
                        @if ($next_blog)
                        <div class="col-lg-6 col-md-6">
                          <div class="prev next">
                            <span>Next Post</span>
                            <p>
                              <a href="{{route('single.blog', $next_blog->slug)}}">
                                {{$next_blog->title}}				
                              </a>
                            </p>
                          </div>    
                        </div>
                        @endif
                      </div>
                    </div>
                    <div id="blog">
                        <div class="blog-items-wrapper">
                          <div class="row">
                            @foreach ($other_blogs as $other_blog)
                            <div class="col-md-6 col-lg-4">
                              <div class="blog-item">
                                <div class="blog-image">
                                  <a href="{{ route('single.blog', $other_blog->slug) }}">
                                    <img src="{{ asset($other_blog->image) }}" alt="blog img"/>
                                  </a>
                                </div>
              
                                <div class="blog-details">
                                  <div class="blog-head d-flex">
                                    <div class="b-tag">
                                      <a href="#">{{ $other_blog->category->title }}</a>
                                    </div>
                                    <div class="blog-time">
                                      <span>{{ $other_blog->created_at->format('d M Y') }}</span>
                                    </div>  
                                  </div>
                                  <div class="blog-title">
                                    <h2>
                                      <a href="{{ route('single.blog', $other_blog->slug) }}">
                                        {{ $other_blog->title }}
                                      </a>  
                                    </h2>
                                  </div>
                                  <div class="read-btn">
                                    <a href="{{ route('single.blog', $other_blog->slug) }}" type="button" class="btn btn-primary">Read More</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                  </div>      
                </div>
              </div>
              <div class="col-lg-4" >
                <div class="details-blog">
                  
                  <div class="short-catagory">
                    <div class="short-catagory-heading">
                      <h3>Explore Topics</h3>
                    </div>
                    <div class="short-catagory-list">
                      <ul>
                        @foreach ($categories as $category)
                        <li>
                          <i class="fas fa-arrow-right"></i>
                          <a href="#">{{ $category->title }}</a>
                           <span>({{ $category->blogs->count() }})</span>
                        </li>
                        @endforeach
                        
                      </ul>
                    </div>
                  </div>
                  <div class="short-news">
                    <div class="short-news-para">
                      <h4>Newsletter</h4> 
                    </div>
                    <form action="{{ route('subscriber.store') }}" method="POST">
                    <div class="short-news-mail">
                        @csrf
                        <input type="email" name="email" placeholder="Your email address">
                        @if($errors->has('email'))
                        <small class="text-danger d-block text-start">{{$errors->first('email')}} </small>
                        @endif
                        @if (Session::has('success'))
                        <small class="text-primary d-block text-start">Thank you for becoming a subscriber.</small>
                        @endif
                      </div>
                      <div class="short-news-btn">
                        <button class="news-btn" type="submit">Subscribe</button>
                      </div>
                    </form>
                  </div>
                  <div class="short-tag">
                    <div class="short-tag-head">
                      <h4>Tag Cloud</h4>
                    </div>
                    <div class="short-blog-tag">
                        @foreach ($blog->tags as $tag_2)
                        <a href="#">#{{$tag_2->title}}</a>
                        @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </section>
    <!-- Blog-deatils area end -->
    <!-- ===================================== -->
@endsection