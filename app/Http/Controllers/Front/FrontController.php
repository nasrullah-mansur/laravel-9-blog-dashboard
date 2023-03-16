<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Award;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogSidebar;
use App\Models\BlogTag;
use App\Models\Chamber;
use App\Models\Contact;
use App\Models\Day;
use App\Models\ImageGallery;
use App\Models\Specialties;
use App\Models\Testimonial;
use App\Models\Time;
use App\Models\Training;
use App\Models\VideoGallery;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $specials = Specialties::where('status', STATUS_ACTIVE)->get();
        $videos = VideoGallery::orderBy('created_at', 'DESC')->take(4)->get();
        $testimonials = Testimonial::where('status', STATUS_ACTIVE)->get();
        $trainings = Training::where('status', STATUS_ACTIVE)->get();
        $awards = Award::where('status', STATUS_ACTIVE)->get();

        $chambers = Chamber::take(2)->get();

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
            'awards',
            'chambers'
        ));
    }

    public function blogs()
    {
        $title = 'Our Blogs';
        $blogs = Blog::where('status', STATUS_ACTIVE)->orderBy('created_at', 'desc')->paginate(9);
        $sidebar = BlogSidebar::first();
        $categories = BlogCategory::with('blogs')->get();
        $tags = BlogTag::all();
        return view('front.blog.blog', compact('blogs', 'title', 'sidebar', 'categories', 'tags'));
    }

    public function blog_by_category($slug)
    {
        $blogCat = BlogCategory::where('slug', $slug)->firstOrFail();
        $title = 'Category: ' . $blogCat->title;

        $blogs = Blog::where('status', STATUS_ACTIVE)
            ->where('blog_category_id', $blogCat->id)
            ->orderBy('created_at', 'desc')
            ->paginate(9);
        $sidebar = BlogSidebar::first();
        $categories = BlogCategory::with('blogs')->get();
        $tags = BlogTag::all();
        return view('front.blog.blog', compact('blogs', 'title', 'sidebar', 'categories', 'tags'));
    }

    public function blog_by_tag($slug)
    {
        $tag = BlogTag::where('slug', $slug)->firstOrFail();
        $title = '#' . $tag->title;

        $blogs = $tag->blogs()
            ->where('status', STATUS_ACTIVE)
            ->orderBy('created_at', 'DESC')
            ->paginate(9);

        $sidebar = BlogSidebar::first();
        $categories = BlogCategory::with('blogs')->get();
        $tags = BlogTag::inRandomOrder()
            ->take(15)
            ->get();
        return view('front.blog.blog', compact('blogs', 'title', 'sidebar', 'categories', 'tags'));
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

        $sidebar = BlogSidebar::first();

        return view('front.blog.single', compact('blog', 'previous_blog', 'next_blog', 'other_blogs', 'categories', 'sidebar'));
    }

    public function blog_by_search_get(Request $request)
    {
        if ($request->key) {
            return redirect()->route('blog.by.search.set', $request->key);
        } else {
            return redirect()->route('front.blog');
        }
    }

    public function blog_by_search_set($key)
    {
        $title = 'Result of: ' . $key;
        $blogs = Blog::where('status', STATUS_ACTIVE)
            ->where('title', 'LIKE', '%' . $key . '%')
            ->orWhere('content', 'LIKE', '%' . $key . '%')
            ->orderBy('created_at', 'DESC')
            ->paginate(9);
        $sidebar = BlogSidebar::first();
        $categories = BlogCategory::with('blogs')->get();
        $tags = BlogTag::all();
        return view('front.blog.blog', compact('blogs', 'title', 'sidebar', 'categories', 'tags'));
    }

    // User profile;
    public function profile()
    {
        return view('front.profile.profile');
    }

    // Chambers;
    public function chambers()
    {
        $title = 'Our Chambers';
        $chambers = Chamber::all();
        $days = Day::all();
        $times = Time::all();
        $sidebar = BlogSidebar::first();
        return view('front.chamber.index', compact('title', 'chambers', 'days', 'times', 'sidebar'));
    }

    public function chambers_by_search_set(Request $request)
    {
        $day = $request->day == null ? 'all' : $request->day;
        $time = $request->time == null ? 'all' : $request->time;

        return redirect()->route('front.chamber.get', [$day, $time]);
    }

    public function chambers_by_search_get($day, $time)
    {

        $my_time = Time::where('slug', $time)->first();
        $my_day = Day::where('slug', $day)->first();

        if ($day == 'all') {
            if ($time == 'all') {
                $chambers = Chamber::all();
                $title = 'Our Chambers';
            } else {
                $chambers = $my_time->chambers()->get();
                $title = $my_time->time;
            }
        } else {
            if ($time == 'all') {
                $chambers = $my_day->chambers()->get();
                $title = $my_day->day;
            } else {

                $chambers = Chamber::whereHas('days', function ($query) use ($day) {
                    $query->where('slug', $day);
                })
                    ->whereHas('times', function ($query) use ($time) {
                        $query->where('slug', $time);
                    })
                    ->get();

                $title = $my_day->day . ' - ' . $my_time->time;
            }
        }


        // $title = 'Our Chambers';
        $days = Day::all();
        $times = Time::all();
        $sidebar = BlogSidebar::first();


        return view('front.chamber.index', compact('title', 'chambers', 'days', 'times', 'sidebar'));
    }
}
