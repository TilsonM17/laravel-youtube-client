<?php

namespace Tests\Features;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Tilson\YoutubeApi\Client;
use Tilson\YoutubeApi\Enums\OrderBy;
use Tilson\YoutubeApi\Services\YoutubeDataApi;

class ClientTest extends \Orchestra\Testbench\TestCase
{
    use \Tests\Traits\Configuration;

    /** @test */
    public function it_should_be_send_request_for_list_videos()
    {
        $this->setConfigurationForTests();
        Http::fake();

        $client = new Client(new YoutubeDataApi());

        $client->listChannelVideos()->orderBy(OrderBy::ORDER_BY_TITLE)->limit(10)->get();

        Http::assertSentCount(1);
    }

    /** @test */
    //function it_should_be_send_request_for_list_playlists()
    public function it_should_be_send_request_for_list_playlists()
    {
        $this->setConfigurationForTests();
        Http::fake();

        $client = new Client(new YoutubeDataApi());

        $a = $client->listChannelPlaylist()->limit()->get();

        Http::assertSentCount(1);
    }
}
