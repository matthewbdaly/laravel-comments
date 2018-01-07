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
        $this->loadRoutesFrom(__DIR__.'/../routes.php');
        $this->loadViewsFrom(__DIR__.'/../views', 'comments');
        $this->publishes([
            __DIR__.'/../views' => resource_path('views/vendor/comments'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Matthewbdaly\LaravelComments\Contracts\Repositories\Comment', function () {
            $baseRepo = new \Matthewbdaly\LaravelComments\Eloquent\Repositories\Comment(new \Matthewbdaly\LaravelComments\Eloquent\Models\Comment);
            $cachingRepo = new \Matthewbdaly\LaravelComments\Eloquent\Repositories\Decorators\Comment($baseRepo, $this->app['cache.store']);
            return $cachingRepo;
        });
        $this->app->singleton('Matthewbdaly\LaravelComments\Contracts\Repositories\Comment\Flag', function () {
            $baseRepo = new \Matthewbdaly\LaravelComments\Eloquent\Repositories\Comment\Flag(new \Matthewbdaly\LaravelComments\Eloquent\Models\Comment\Flag);
            $cachingRepo = new \Matthewbdaly\LaravelComments\Eloquent\Repositories\Decorators\Comment\Flag($baseRepo, $this->app['cache.store']);
            return $cachingRepo;
        });
    }
}
