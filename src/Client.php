<?php

declare(strict_types=1);

namespace Tilson\YoutubeApi;

use Tilson\YoutubeApi\Contract\IYoutubeDataApi;
use Tilson\YoutubeApi\Helpers\GenericHelpers;
use Tilson\YoutubeApi\Enums\OrderBy;
use Tilson\YoutubeApi\Services\YoutubeDataApi;
use Tilson\YoutubeApi\Traits\FilterTrait;
use ZBateson\MailMimeParser\Message\Helper\GenericHelper;

class Client
{
    use FilterTrait;
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
    private string $order;

    /**
     * @var string $type
     * The type parameter restricts a search query to only retrieve a particular type of resource.
     */
    private string $type = 'video';


    private IYoutubeDataApi $youtubeDataApi;

    public function __construct(IYoutubeDataApi $youtubeDataApi)
    {
        [$this->key, $this->channelId] = GenericHelpers::validateConfig();
        $this->youtubeDataApi = $youtubeDataApi;
    }

    public function listChannelVideos()
    {
        return $this;
    }

    public function listPlaylistVideos()
    {
         $this->youtubeDataApi->searchVideosInMyChannel();
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
        $response = $this->youtubeDataApi->searchVideosInMyChannel(GenericHelpers::getAllProperties($this));

        return ['pageInfo' => $response['pageInfo'], 'video' => $response['items']];
    }
}
