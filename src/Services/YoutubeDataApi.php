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
       return Http::get('https://www.googleapis.com/youtube/v3/search', $params)
            ->throw()
            ->json();
    }

    public function searchPlaylistInMyChannel(array $params = [])
    {
        return Http::get('https://www.googleapis.com/youtube/v3/playlists', $params)
            ->throw()
            ->json();
    }
}
