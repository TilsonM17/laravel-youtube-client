<?php

namespace Tilson\YoutubeApi\Helpers;

use Exception;

use Illuminate\Support\Facades\Config;

class ValidationHelper
{
    /**
     * Validate the config file
     *
     * @return array
     * @throws Exception
     */
    public static function validateConfig()
    {
        dd([
            config('youtube_api.api_youtube_key'), config('youtube_api.channel_id'),
            env('API_YOUTUBE_KEY'), env('CHANNEL_ID')]);
    }
}
