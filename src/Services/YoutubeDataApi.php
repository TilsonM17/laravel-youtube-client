<?php

namespace Tilson\YoutubeApi\Services;

use Illuminate\Support\Facades\Http;
use Tilson\YoutubeApi\Contract\IYoutubeDataApi;

/**
 * @todo Alterar os endpoint por valores que vem do arquivo de configuração
 */
class YoutubeDataApi implements IYoutubeDataApi
{   
    /**
     * @throws \Illuminate\Http\Client\RequestException
     * @return json
     */
    public function searchVideosInMyChannel(array $params = [])
    {
       return Http::get(config('youtube_api.uri.api_uri_search'), $params)
            ->throw()
            ->json();
    }

    public function searchPlaylistInMyChannel(array $params = [])
    {
        return Http::get(config('youtube_api.uri.api_uri_playlist'), $params)
            ->throw()
            ->json();
    }
}
