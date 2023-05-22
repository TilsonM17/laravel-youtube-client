<?php

namespace Tests\Traits;

/**
 * Trait Configuration
 */
trait Configuration
{
    public function setConfigurationForTests()
    {
        config()->set('youtube_api.api_key', env('API_YOUTUBE_KEY'));
        config()->set('youtube_api.channel_id', env('CHANNEL_ID'));
        config()->set('youtube_api.uri.api_uri_search','https://www.googleapis.com/youtube/v3/search');
        config()->set('youtube_api.uri.api_uri_playlist','https://www.googleapis.com/youtube/v3/playlists');
    }
}
