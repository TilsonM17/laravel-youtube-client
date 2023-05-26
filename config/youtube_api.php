<?php

return [

    'api_key' => env('API_YOUTUBE_KEY'),

    'channel_id' => env('CHANNEL_ID'),
    
    'uri' => [
        'api_uri_search' => 'https://www.googleapis.com/youtube/v3/search',

        'api_uri_playlist' => 'https://www.googleapis.com/youtube/v3/playlists',
    ],
    /***
     * This section of the settings will deal with the application's subscription button
     */
    'button' => [
        'class' => 'g-ytsubscribe', #The class of the button
        'data-channel' => env('CHANNEL_ID'), #The channel ID to subscribe to
        'data-layout' => 'default', #default | full - The layout of the button
        'data-count' => 'default', #default | hidden - Show or hide the count of subscribers
    ]
    
];
