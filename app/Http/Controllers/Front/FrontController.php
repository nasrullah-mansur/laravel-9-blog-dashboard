<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\ImageGallery;
use App\Models\MenuItem;
use App\Models\VideoGallery;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $banner = Banner::first();
        $blogs = Blog::with('category')->orderBy('created_at', 'DESC')->take(6)->get();
        $image_galleries = ImageGallery::orderBy('created_at', 'DESC')
            ->take(10)
            ->get();
        $video_galleries = VideoGallery::orderBy('created_at', 'DESC')
            ->take(10)
            ->get();

        return view('welcome', compact('blogs', 'image_galleries', 'video_galleries', 'banner'));
    }
}
