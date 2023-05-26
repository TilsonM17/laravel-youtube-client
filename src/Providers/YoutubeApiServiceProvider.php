<?php

namespace Tilson\YoutubeApi\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Tilson\YoutubeApi\Client;
use Tilson\YoutubeApi\Contract\IYoutubeDataApi;
use Tilson\YoutubeApi\Services\YoutubeDataApi;

class YoutubeApiServiceProvider extends ServiceProvider
{
    
    protected $defer = true;

    private function registerBladeDirectives()
    {
        Blade::directive('youtubeButton', function () {
            return "<?php echo '<div class=\"' . config('youtube_api.button.class') . '\" data-channelid=\"' . config('youtube_api.button.data-channel') . '\" data-layout=\"' . config('youtube_api.button.data-layout') . '\" data-count=\"' . config('youtube_api.button.data-count') . '\"></div>' ?>";
        });

        Blade::directive('youtubeScriptButton', function () {
            return "<?php echo '<script src=\"https://apis.google.com/js/platform.js\"></script>' ?>";
        });
    }
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/youtube_api.php' => config_path('youtube_api.php'),
        ], 'youtube');

        $this->registerBladeDirectives();
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
