<?php

use App\Models\MenuItem;
use App\Models\Appearance;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

const STATUS_ACTIVE = 'ACTIVE';
const STATUS_INACTIVE = 'INACTIVE';
const SLIDER_PATH = 'uploaded_file/images/slider/';
const LOGO_PATH = 'uploaded_file/images/logo/';
const FAVICON_PATH = 'uploaded_file/images/favicon/';
const APPEARANCE_PATH = 'uploaded_file/images/appearance/';
const BANNER_PATH = 'uploaded_file/images/banner/';
const BLOG_PATH = 'uploaded_file/images/blog/';
const IMAGE_GALLERY_PATH = 'uploaded_file/images/gallery/';
const REMOVE_MESSAGE = 'All relevant items will be removed permanently and You will not be able to recover this imaginary file!';

// ================ Image Upload =========================== //
function ImageUpload($new_file, $path, $old_image = null)
{
    if (!file_exists(public_path($path))) {
        mkdir(public_path($path), 0777, true);
    }
    $file_name = Str::slug($new_file->getClientOriginalName()) . '_' . rand(111111, 999999) . '.' . $new_file->getClientOriginalExtension();
    $destinationPath = public_path($path);

    if ($old_image != null) {
        if (File::exists(public_path($old_image))) {
            unlink(public_path($old_image));
        }
    }

    $new_file->move($destinationPath, $file_name);

    return $path . $file_name;
};

function ResizeImageUpload($new_file, $path, $old_image, $w, $h)
{
    if (!file_exists(public_path($path))) {
        mkdir(public_path($path), 0777, true);
    }

    $destinationPath = public_path($path);
    $file_name = Str::slug($new_file->getClientOriginalName()) . '_' . rand(111111, 999999) . '.' . $new_file->getClientOriginalExtension();

    if ($old_image != null) {
        if (File::exists(public_path($old_image))) {
            unlink(public_path($old_image));
        }
    }

    Image::make($new_file)
        ->fit($w, $h)
        ->save($destinationPath . $file_name);

    return $path . $file_name;
};

function removeImage($file)
{
    if ($file != null) {
        if (File::exists(public_path($file))) {
            unlink(public_path($file));
        }
    }
}

function generateRandomString($length = 4)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString . '-';
}

function theme()
{
    return $app = Appearance::first();
}

function main_menu()
{
    $main_menu = MenuItem::with('menuItem')
        ->where('status', STATUS_ACTIVE)
        ->where('set_location', 'header-menu')
        ->where('p_id', '0')
        ->orderBy('position')
        ->get();
    return $main_menu;
}

function footer_menu()
{
    $footer_menu = MenuItem::where('status', STATUS_ACTIVE)
        ->where('set_location', 'footer-menu')
        ->orderBy('position')
        ->get();
    return $footer_menu;
}

function category_menu()
{
    $category_menu = MenuItem::where('status', STATUS_ACTIVE)
        ->where('set_location', 'category-menu')
        ->orderBy('position')
        ->get();
    return $category_menu;
}

function latest_blog_gall()
{
    $blog = Blog::orderBy('created_at', 'DESC')
        ->take(4)
        ->get();

    return $blog;
}

function logo()
{
    $app = Appearance::first();
    if ($app) {
        return $app->logo;
    } else {
        return 'front/images/brand-logo.png';
    }
}
