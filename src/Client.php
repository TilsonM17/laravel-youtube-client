<?php

declare(strict_types=1);

namespace Tilson\YoutubeApi;

use Tilson\YoutubeApi\Contract\IYoutubeDataApi;
use Tilson\YoutubeApi\Helpers\GenericHelpers;
use Tilson\YoutubeApi\Enums\OrderBy;
use Tilson\YoutubeApi\Services\YoutubeDataApi;
use Tilson\YoutubeApi\Traits\FilterTrait;

class Client
{
    /**
     * @var string API Key
     */
    private string  $key;

    /**
     * @var string Channel ID
     */
    private string $channelId;

    /**
     * @var string $part
     * The part parameter specifies a comma-separated list of one or more search resource properties that the API response will include.
     */
    private string $part = 'snippet,id';

    /**
     * @var int $maxResults
     * Limit for results per page
     */
    private int $maxResults;

    /**
     * @var OrderBy $orderBy
     * Order results by
     */
    private string $order = OrderBy::ORDER_BY_DATE;

    /**
     * @var string $type
     * The type parameter restricts a search query to only retrieve a particular type of resource.
     */
    private string $type = 'video';

    /**
     * Client constructor.
     * @param IYoutubeDataApi $youtubeDataApi
     */
    public function __construct(private IYoutubeDataApi $youtubeDataApi)
    {
        [$this->key, $this->channelId] = GenericHelpers::validateConfig();
        $this->youtubeDataApi = $youtubeDataApi;
    }

    public function listChannelVideos()
    {
        return $this;
    }

    public function listChannelPlaylist()
    {
        $this->type = 'playlist';
        return $this;
    }

    /**
     * Set the order of the results
     *
     * @param OrderBy $orderBy
     * @return $this
     */
    public function orderBy($orderBy = OrderBy::ORDER_BY_DATE)
    {
        $this->order = $orderBy;
        return $this;
    }

    public function limit(int $maxResults = 10)
    {
        $this->maxResults = $maxResults;
        return $this;
    }
    /**
     * Main method responsible for making the API call
     * @param array $query[] = ''
     */
    public function get()
    {   
        if($this->type === 'video')
            $response = $this->youtubeDataApi->searchVideosInMyChannel(GenericHelpers::getAllProperties($this));
        else
            $response = $this->youtubeDataApi->searchPlaylistInMyChannel(GenericHelpers::getAllProperties($this));
   
     return $response ?['pageInfo' => $response['pageInfo'], 'video' => $response['items']] : ['error' => 'No Items found'];
    }
}
