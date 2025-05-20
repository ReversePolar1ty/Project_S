<?php

namespace App\Providers;

use App\Events\CreatedEvent;
use App\Listeners\CreateProfileListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        CreatedEvent::class => [
            CreateProfileListener::class,
        ]
    ];
}
