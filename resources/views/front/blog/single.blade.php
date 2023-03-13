@extends('front.leyout.layout', [$title = $blog->title])

@push('page_css')
    <link rel="stylesheet" href="{{asset('front/css/pages/blog.css')}}">
@endpush

@if ($blog->custom_css)
@push('custom_page_css')
    <style>
        {!! $blog->custom_css !!}
    </style>
@endpush
@endif

@if ($blog->custom_js)
@push('custom_page_js')
    <script>
        {!! $blog->custom_js !!}
    </script>
@endpush
@endif

@section('content')
<!-- Page banner start -->
<div class="page-banner" style="background-image: url({{ asset('front/images/banner-bg.jpg') }});">
  <div class="container">
      <h2>{{ $blog->title }}</h2>
  </div>
</div>
<!-- Page banner end -->
   <!-- Blog section start -->
   <section class="blog-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="single-blog">
                    <div class="single-blog-title">
                        <h2>{{ $blog->title }}</h2>
                        <a href="{{ route('blog.by.category', $blog->category->slug) }}" class="category">
                          {{$blog->category->title}}
                      </a>
                      <span class="time">
                          <i class="far fa-calendar"></i>
                          {{$blog->created_at->format('d M Y')}}
                      </span>
                    </div>
                    <img class="w-100 img-fluid" src="{{ asset($blog->image) }}" alt="{{$blog->title}}">
                    <div class="description">
                        <p>{{$blog->content}}</p>
                    </div>

                    <div class="details">
                        {!! $blog->details !!}
                    </div>

                    <div class="next-prev">
                        <ul>
                          @if ($previous_blog)
                          <li>
                              <a href="{{ route('single.blog', $previous_blog->slug) }}">
                                  <span>Previous blog</span>
                                  <p>{{ $previous_blog->title }}</p>
                              </a>
                          </li>
                          @endif
                          @if ($next_blog)
                          <li class="text-lg-end">
                              <a href="{{route('single.blog', $next_blog->slug)}}">
                                  <span>Next blog</span>
                                  <p>{{ $next_blog->title }}</p>
                              </a>
                          </li>
                          @endif
                        </ul>
                    </div>

                    <div class="also-like">
                        <h3>You may also like</h3>
                        <div class="row">
                          @foreach ($other_blogs as $like)
                          <div class="col-lg-4">
                            <div class="blog-item">
                                <div class="img">
                                    <a href="{{route('single.blog', $like->slug)}}">
                                        <img class="img-fluid w-100" src="{{ asset($like->image) }}" alt="{{$like->title}}" />
                                    </a>
                                </div>
                                <div class="blog-text">
                                    <div class="blog-content">
                                        <h3 class="mb-0">
                                            <a href="{{route('single.blog', $like->slug)}}">{{ $like->title }}</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                          @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
              <div class="right-sidebar">
                  @if ($sidebar)
                  <div class="sidebar-item">
                      <div class="cta">
                          <img src="{{ asset($sidebar->image) }}" alt="{{$sidebar->content}}" />
                          <p>{{ $sidebar->content }}</p>
                          <a href="{{$sidebar->btn_link}}">{{$sidebar->btn_text}}</a>
                      </div>
                  </div>
                  @endif
                  <div class="sidebar-item">
                      <div class="category">
                          <h4>Categories</h4>
                          <ul>
                              @foreach ($categories as $category)
                              <li>
                                  <a href="{{route('blog.by.category', $category->slug)}}">
                                      <span>{{ $category->title }}</span>
                                      <span>({{$category->blogs->count()}})</span>
                                  </a>
                              </li>
                              @endforeach
                          </ul>
                      </div>
                  </div>
                  <div class="sidebar-item">
                      <div class="tags">
                          <h4>Tags</h4>
                          <ul>
                              @foreach ($blog->tags as $tag)
                              <li><a href="{{ route('blog.by.tag', $tag->slug) }}">#{{$tag->title}}</a></li>
                              @endforeach
                          </ul>
                      </div>
                  </div>
                  @foreach (single_blog_add() as $add)
                    <div class="sidebar-item">
                        <a href="{{$add->link}}" class="add">
                            <img class="img-fluid w-100" src="{{asset($add->image)}}" alt="{{$add->title}}" />
                        </a>
                    </div>
                    @endforeach
              </div>
          </div>
        </div>
    </div>
</section>
<!-- Blog section end -->
@endsection