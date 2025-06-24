<?php

namespace App\Providers;

use App\Models\Industry;
use App\Models\Product;
use App\Models\Ticket;
use App\Observers\IndustryObserver;
use App\Observers\ProductObserver;
use App\Observers\TicketObserver;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Ticket::observe(TicketObserver::class);
        Product::observe(ProductObserver::class);
        Industry::observe(IndustryObserver::class);
    }
}
