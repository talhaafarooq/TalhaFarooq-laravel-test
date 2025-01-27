<?php

namespace App\Providers;

use App\Contracts\TaskRepositoryInterface;
use App\Events\TaskCreated;
use App\Listeners\SendTaskCreatedNotification;
use App\Services\TaskService;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TaskRepositoryInterface::class, TaskService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Bind The event listeners
        Event::listen(TaskCreated::class, SendTaskCreatedNotification::class);
    }
}
