<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\UpcomingBlog;
use Illuminate\Http\Request;
use App\DataTables\UpcomingBlogDataTable;
use App\Models\UpcomingBlogCategory;

class UpcomingBlogController extends Controller
{
    public function index(UpcomingBlogDataTable $dataTable)
    {
        // return UpcomingBlog::with('category')->get();
        return $dataTable->render('back.blog_upcoming.index');
    }

    public function create()
    {
        $categories = UpcomingBlogCategory::all();
        return view('back.blog_upcoming.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:png,jpg',
            'content' => 'required',
            'details' => 'required',
            'status' => 'required',
            'blog_category_id' => 'required'
        ], [
            'blog_category_id.required' => 'The blog category field is required.'
        ]);

        $blog = new UpcomingBlog();
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->image = ImageUpload($request->image, BLOG_PATH);
        $blog->thumbnail = 'image thumbnail';
        $blog->content = $request->content;
        $blog->details = $request->details;
        $blog->custom_css = $request->custom_css;
        $blog->custom_js = $request->custom_js;
        $blog->blog_category_id = $request->blog_category_id;
        $blog->status = $request->status;

        $blog->save();


        return redirect()->route('up.blog.index')->with('success', 'Blog added successfully');
    }

    public function edit($id)
    {
        $blog = UpcomingBlog::where('id', $id)->firstOrFail();
        $categories = UpcomingBlogCategory::all();
        
        return view('back.blog_upcoming.edit', compact('categories', 'blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|mimes:png,jpg',
            'content' => 'required',
            'details' => 'required',
            'status' => 'required',
            'blog_category_id' => 'required'
        ], [
            'blog_category_id.required' => 'The blog category field is required.'
        ]);

        $blog = UpcomingBlog::where('id', $id)->firstOrFail();
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $blog->image = ImageUpload($request->image, BLOG_PATH);
            $blog->thumbnail = 'image thumbnail';
        }

        $blog->content = $request->content;
        $blog->details = $request->details;
        $blog->blog_category_id = $request->blog_category_id;
        $blog->status = $request->status;
        $blog->custom_css = $request->custom_css;
        $blog->custom_js = $request->custom_js;

        $blog->save();

        return redirect()->route('up.blog.index')->with('success', 'Blog updated successfully');
    }

    public function delete(Request $request)
    {
        $blog = UpcomingBlog::where('id', $request->id)->firstOrFail();
        removeImage($blog->image);
        $blog->delete();

        return redirect()->route('up.blog.index')->with('success', 'Blog removed successfully');
    }
}
