<?php

namespace App\Listeners;

use App\Events\ProductDelete;
use App\Events\ProductEdit;
use App\Events\ProductsImagesEvent;
use App\Models\Product;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Storage;

class ImageSubscribe
{
    public function subscribe(Dispatcher $event)
    {
        $event->listen(ProductsImagesEvent::class,'App\Listeners\ImageSubscribe@CreatePhotos');
        $event->listen(ProductDelete::class,'App\Listeners\ImageSubscribe@DeleteImages');


    }

    public function CreatePhotos(ProductsImagesEvent $event)
    {
        if ($event->getImages()){

            $images=$event->getImages();
            foreach ($images as $image){

                $path=Storage::disk('public')->put('images',$image);
                $event->getProduct()->images()->create(['path'=>$path]);
            }
        }

    }

    public function DeleteImages(ProductDelete $event)
    {
        $product=$event->getProduct();
        foreach ($product->images as $image){
            $fileName=$image->path;
            Storage::disk('public')->delete($fileName);
        }
    }
}
