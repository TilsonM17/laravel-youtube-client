<?php

use Illuminate\Support\ServiceProvider;

class YoutubeApiServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind('');
        $this->mergeConfigFrom(__DIR__ . '/../config/youtube_api.php', 'youtube_api');
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/youtube_api.php' => config_path('youtube_api.php'),
        ], 'youtube-api');
    }
}