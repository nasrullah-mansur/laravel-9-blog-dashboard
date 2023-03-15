@extends('front.leyout.layout', [$title = 'Our Chambers'])

@push('page_css')
    <link rel="stylesheet" href="{{asset('front/css/pages/chamber.css')}}">
@endpush

@section('content')
<!-- Page banner start -->
<div class="page-banner" style="background-image: url({{ asset('front/images/banner-bg.jpg') }});">
    <div class="container">
        <h2>{{ $title }}</h2>
    </div>
</div>
<!-- Page banner end -->

<!-- Chamber section start -->
<section class="blog-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="sidebar-filter">

                </div>
            </div>
            <div class="col-lg-10">
                <div class="blog-content">
                    <div class="form-search">
                        <form action="{{route('blog.by.search.get')}}" method="POST" class="search-content">
                            @csrf
                            <input name="key" type="search" placeholder="Search here...">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="row">
                        @forelse ($blogs as $blog)
                        <div class="col-lg-4">
                            <div class="blog-item">
                                <div class="img">
                                    <a href="{{ route('single.blog', $blog->slug) }}"><img class="img-fluid w-100" src="{{ asset($blog->image)}}" alt="{{$blog->title}}" /></a>
                                </div>
                                <div class="blog-text">
                                    <div class="blog-item-title">
                                        <a href="{{ route('blog.by.category', $blog->category->slug) }}" class="category">
                                            {{$blog->category->title}}
                                        </a>
                                        <span class="time">
                                            <i class="far fa-calendar"></i>
                                            {{$blog->created_at->format('d M Y')}}
                                        </span>
                                    </div>

                                    <div class="blog-content">
                                        <h3>
                                            <a href="{{route('single.blog', $blog->slug)}}">{{$blog->title}}</a>
                                        </h3>
                                        <p>
                                            {{ $blog->content }}
                                        </p>
                                    </div>
                                    <div class="read-more">
                                        <a href="{{route('single.blog', $blog->slug)}}">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p class="no-blog"><i class="far fa-frown-open"></i> No blog found <i class="far fa-frown-open"></i></p>
                        @endforelse
                    </div>
                </div>
                <div class="paginate-area">
                    {{ $blogs->onEachSide(3)->links() }}
                </div>
            </div>
            
        </div>
    </div>
</section>
<!-- Chamber section end -->

@endsection