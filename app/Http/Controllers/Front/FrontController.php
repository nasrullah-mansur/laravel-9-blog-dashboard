<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Award;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\ImageGallery;
use App\Models\Specialties;
use App\Models\Testimonial;
use App\Models\Training;
use App\Models\VideoGallery;

class FrontController extends Controller
{
    public function index()
    {
        $specials = Specialties::where('status', STATUS_ACTIVE)->get();
        $videos = VideoGallery::orderBy('created_at', 'DESC')->take(4)->get();
        $testimonials = Testimonial::where('status', STATUS_ACTIVE)->get();
        $trainings = Training::where('status', STATUS_ACTIVE)->get();
        $awards = Award::where('status', STATUS_ACTIVE)->get();

        $banner = Banner::first();
        $blogs = Blog::with('category')->orderBy('created_at', 'DESC')->take(6)->get();
        $image_galleries = ImageGallery::orderBy('created_at', 'DESC')
            ->take(10)
            ->get();
        $video_galleries = VideoGallery::orderBy('created_at', 'DESC')
            ->take(10)
            ->get();

        return view('welcome', compact(
            'blogs',
            'image_galleries',
            'video_galleries',
            'banner',
            'specials',
            'videos',
            'testimonials',
            'trainings',
            'awards'
        ));
    }

    public function single_blog($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();

        $previous_id = Blog::where('id', '<', $blog->id)->max('id');
        $next_id = Blog::where('id', '>', $blog->id)->min('id');

        $previous_blog = Blog::where('id', $previous_id)->first(['title', 'slug']);
        $next_blog = Blog::where('id', $next_id)->first(['title', 'slug']);

        $other_blogs = Blog::where('slug', '!=', $slug)->take(3)->get();
        $categories = BlogCategory::with('blogs')->get();

        return view('front.blog.single', compact('blog', 'previous_blog', 'next_blog', 'other_blogs', 'categories'));
    }

    // User profile;
    public function profile()
    {
        return view('front.profile.profile');
    }
}
