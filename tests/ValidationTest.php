<?php

namespace Tests;

use \Tilson\Youtube\Client;
use \Tilson\YoutubeApi\Enums\OrderBy;
use Tilson\YoutubeApi\Client as YoutubeApiClient;


class ValidationTest extends \Orchestra\Testbench\TestCase
{
    /**
     * @test
     */
    public function validateIfReturnArrayOfKey()
    {
        $cliente = new YoutubeApiClient();
        dd($cliente->listChannelVideos()
            ->orderBy(OrderBy::ORDER_BY_DATE)
            ->limit()
            ->get());
    }
}
