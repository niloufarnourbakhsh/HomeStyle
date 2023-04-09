<?php

namespace App\Listeners;

use App\Events\categoryCreatePhoto;
use App\Events\categoryDeletePhoto;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Storage;

class CategorySubscribe
{

    public function subscribe(Dispatcher $event)
    {
        $event->listen(categoryDeletePhoto::class,'app\Listeners\CategorySubscribe@deletePhoto');
        $event->listen(categoryCreatePhoto::class,'app\Listeners\CategorySubscribe@createPhoto');
    }

    public function deletePhoto(categoryDeletePhoto $event)
    {
        if ($event->getImage()){
            Storage::disk('public')->delete($event->getImage());
        }
    }

    public function createPhoto($event)
    {
        if ($event->getImages()) {
            $path = Storage::disk('public')->put('images', $event->getImages());

            $event->getCategory()->images()->create(['path' => $path]);
        }
    }
}
