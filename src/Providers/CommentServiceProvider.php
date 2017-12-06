<?php

namespace Matthewbdaly\LaravelComments\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Service provider for flat pages
 */
class CommentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        //$this->loadViewsFrom(__DIR__.'/../views', 'comments');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Matthewbdaly\LaravelComments\Contracts\Comment', function () {
            $baseRepo = new \Matthewbdaly\LaravelComments\Eloquent\Repositories\Comment(new \Matthewbdaly\LaravelComments\Eloquent\Models\Comment);
            $cachingRepo = new \Matthewbdaly\LaravelComments\Eloquent\Repositories\Decorators\Comment($baseRepo, $this->app['cache.store']);
            return $cachingRepo;
        });
    }
}
