<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function delete($id)
    {
        $image = Image::find($id);
        $num = $image->imageable_id;
        $count = Image::query()->where(['imageable_id' => $num])->count();
        if ($count > 1) {
            if ($image) {
                Storage::disk('public')->delete($image->path);
            }
            $image->delete();

            Session::flash('delete_image', 'تصویر مورد نظر حذف شد');
            return redirect()->back();
        }
        Session::flash('delete_image', 'تعداد تصاویر موجو کمتر از یک هست و حداقل یک تصویر از محصول باید موجود باشد');
        return redirect()->back();
    }
}
