<?php

namespace App\Http\Controllers\Back;

use App\Models\CustomPage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\CustomPageDataTable;

class CustomPageController extends Controller
{
    public function index(CustomPageDataTable $dataTable)
    {
        return $dataTable->render('back.custom_page.index');
    }

    public function create()
    {
        return view('back.custom_page.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'html' => 'required'
        ]);

        $page = new CustomPage();
        $page->name = $request->name;
        $page->title = $request->title;
        $page->slug = Str::slug($page->title);
        $page->html = $request->html;
        $page->css = $request->css;
        $page->javascript = $request->javascript;

        $page->save();

        return redirect()->route('custom.page.index')->with('success', 'Custom page added successfully');
    }


    public function edit($id)
    {
        $page = CustomPage::where('id', $id)->firstOrFail();
        return view('back.custom_page.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'html' => 'required'
        ]);

        $page = CustomPage::where('id', $id)->firstOrFail();
        $page->name = $request->name;
        $page->title = $request->title;
        $page->slug = Str::slug($page->title);
        $page->html = $request->html;
        $page->css = $request->css;
        $page->javascript = $request->javascript;

        $page->save();

        return redirect()->route('custom.page.index')->with('success', 'Custom page updated successfully');
    }

    public function delete(Request $request)
    {
        $page = CustomPage::where('id', $request->id)->firstOrFail();
        $page->delete();
    }
}
