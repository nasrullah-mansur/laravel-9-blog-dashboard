<?php

namespace App\Http\Controllers\Back;

use App\Models\Blog;
use App\Models\BlogTag;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('back.blog.index');
    }

    public function create()
    {
        $categories = BlogCategory::all();
        $tags = BlogTag::all();
        return view('back.blog.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:png,jpg',
            'content' => 'required',
            'status' => 'required'
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->image = ImageUpload($request->image, BLOG_PATH);
        $blog->thumbnail = 'image thumbnail';
        $blog->content = $request->content;
        $blog->blog_category_id = $request->blog_category_id;
        $blog->status = $request->status;

        $blog->save();

        $blog->tags()->attach($request->tags);


        return redirect()->route('blog.index')->with('success', 'Blog added successfully');
    }

    public function edit($id)
    {
        $blog = Blog::where('id', $id)->firstOrFail();
        $categories = BlogCategory::all();
        $tags = BlogTag::all();

        $active_tags = [];

        foreach ($blog->tags as $t) {
            array_push($active_tags, $t->id);
        }

        return view('back.blog.edit', compact('categories', 'tags', 'blog', 'active_tags'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|mimes:png,jpg',
            'content' => 'required',
            'status' => 'required'
        ]);

        $blog = Blog::where('id', $id)->firstOrFail();
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $blog->image = ImageUpload($request->image, BLOG_PATH);
            $blog->thumbnail = 'image thumbnail';
        }

        $blog->content = $request->content;
        $blog->blog_category_id = $request->blog_category_id;
        $blog->status = $request->status;

        $blog->save();

        $blog->tags()->sync($request->tags);


        return redirect()->route('blog.index')->with('success', 'Blog updated successfully');
    }

    public function delete(Request $request)
    {
        $blog = Blog::where('id', $request->id)->firstOrFail();
        removeImage($blog->image);
        $blog->tags()->detach($blog->tags);
        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Blog removed successfully');
    }
}
