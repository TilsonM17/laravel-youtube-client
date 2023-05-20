<?php

return [

    'api_key' => env('API_YOUTUBE_KEY'),

    'channel_id' => env('CHANNEL_ID'),
    
    'uri' => [
        'api_uri_search' => 'https://www.googleapis.com/youtube/v3/search',

        'api_uri_playlist' => 'https://www.googleapis.com/youtube/v3/playlists',
    ]
    

];
