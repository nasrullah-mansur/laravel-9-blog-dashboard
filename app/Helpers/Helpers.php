<?php

use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

const STATUS_ACTIVE = 'ACTIVE';
const STATUS_INACTIVE = 'INACTIVE';
const SLIDER_PATH = 'uploaded_file/images/slider/';
const APPEARANCE_PATH = 'uploaded_file/images/appearance/';
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
