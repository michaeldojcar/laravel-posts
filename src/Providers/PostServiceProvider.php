<?php

namespace MichaelDojcar\LaravelPosts\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class PostServiceProvider
 *
 * @package MichaelDojcar\LaravelPosts\Providers
 */
class PostServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/posts.php', 'posts');
    }

    public function boot()
    {
        // Migrations
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        // Publish config
        $this->publishConfig();
    }

    private function publishConfig()
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__ . '/../../config/posts.php' => config_path('posts.php'),
            ], 'config');

        }
    }
}