<?php

namespace App\Providers;

use App\Events\ProductsImagesEvent;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
//        ProductsImagesEvent::class=>[
//            'App\Listeners\ImageSubscribe'
//        ]
    ];
    protected $subscribe=[
        'App\Listeners\ImageSubscribe',
        'App\Listeners\CategorySubscribe',
    ];
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
