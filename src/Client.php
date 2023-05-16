<?php

declare(strict_types=1);

namespace Tilson\YoutubeApi;

use Tilson\YoutubeApi\Helpers\ValidationHelper;
use Illuminate\Support\Facades\Facade;

class Client 
{
    /**
     * @readonly
     * @var string API Key
     */
    private readonly string  $apiKey;

    /**
     * @readonly
     * @var string Channel ID
     */
    private readonly string $channelId;

    public function __construct() 
    {
       [$this->apiKey, $this->channelId ] = ValidationHelper::validateConfig();
      
    }

    public function getChannelVideos(): bool
    {
        return true;
    }
}