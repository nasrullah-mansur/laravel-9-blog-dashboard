<?php

namespace App\Http\Controllers\Front;

use App\Models\Day;
use App\Models\Blog;
use App\Models\Time;
use App\Models\Award;
use App\Models\Banner;
use App\Models\BlogTag;
use App\Models\Chamber;
use App\Models\Contact;
use App\Models\CustomPage;
use App\Models\BlogSidebar;
use App\Models\Specialties;
use App\Models\Testimonial;
use App\Models\BlogCategory;
use App\Models\ImageGallery;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UpcomingBlog;
use App\Models\UpcomingBlogCategory;

class FrontController extends Controller
{
    public function index()
    {

        $specials = Specialties::where('status', STATUS_ACTIVE)->get();
        $videos = VideoGallery::orderBy('created_at', 'DESC')->take(6)->get();


        $banner = Banner::first();
        $blogs = Blog::with('category')->orderBy('created_at', 'DESC')->take(6)->get();

        $video_galleries = VideoGallery::orderBy('created_at', 'DESC')
            ->take(10)
            ->get();

        return view('welcome', compact(
            'blogs',
            'video_galleries',
            'banner',
            'specials',
            'videos',
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

    public function custom_page($slug)
    {
        $page = CustomPage::where('slug', $slug)->firstOrFail();

        return view('front.custom.custom', compact('page'));
    }


    // Upcoming Blogs;
    public function up_blogs()
    {
        $title = 'Blogs';
        $blogs = UpcomingBlog::where('status', STATUS_ACTIVE)->orderBy('created_at', 'desc')->paginate(9);
        $sidebar = BlogSidebar::first();
        $categories = UpcomingBlogCategory::with('blogs')->get();
        return view('front.blog_upcoming.blog', compact('blogs', 'title', 'sidebar', 'categories'));
    }

    public function up_single_blog($slug)
    {
        $blog = UpcomingBlog::where('slug', $slug)->firstOrFail();

        $previous_id = UpcomingBlog::where('id', '<', $blog->id)->max('id');
        $next_id = UpcomingBlog::where('id', '>', $blog->id)->min('id');

        $previous_blog = UpcomingBlog::where('id', $previous_id)->first(['title', 'slug']);
        $next_blog = UpcomingBlog::where('id', $next_id)->first(['title', 'slug']);

        $other_blogs = UpcomingBlog::where('slug', '!=', $slug)->take(3)->get();
        $categories = UpcomingBlogCategory::with('blogs')->get();

        $sidebar = BlogSidebar::first();

        return view('front.blog_upcoming.single', compact('blog', 'previous_blog', 'next_blog', 'other_blogs', 'categories', 'sidebar'));
    }

    public function up_blog_by_category($slug)
    {
        $blogCat = UpcomingBlogCategory::where('slug', $slug)->firstOrFail();
        $title = 'Category: ' . $blogCat->title;

        $blogs = UpcomingBlog::where('status', STATUS_ACTIVE)
            ->where('blog_category_id', $blogCat->id)
            ->orderBy('created_at', 'desc')
            ->paginate(9);
        $sidebar = BlogSidebar::first();
        $categories = UpcomingBlogCategory::with('blogs')->get();
        return view('front.blog_upcoming.blog', compact('blogs', 'title', 'sidebar', 'categories'));
    }
}
