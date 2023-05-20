<?php

namespace Tilson\YoutubeApi\Providers;

use Illuminate\Support\ServiceProvider;
use Tilson\YoutubeApi\Client;
use Tilson\YoutubeApi\Contract\IYoutubeDataApi;
use Tilson\YoutubeApi\Services\YoutubeDataApi;

class YoutubeApiServiceProvider extends ServiceProvider
{
    
    protected $defer = true;

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/youtube_api.php' => config_path('youtube_api.php'),
        ], 'youtube');
    }

    public function register()
    {
        $this->app->bind(IYoutubeDataApi::class, YoutubeDataApi::class);

        $this->app->bind(Client::class, function ($app) {
            return new Client(
                new YoutubeDataApi()
            );
        });
    }

    public function provides()
    {
        return [Client::class];
    }
}
