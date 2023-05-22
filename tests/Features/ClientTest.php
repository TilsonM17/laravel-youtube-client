<?php

namespace Tests\Features;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Tilson\YoutubeApi\Client;
use Tilson\YoutubeApi\Services\YoutubeDataApi;

class ClientTest extends \Orchestra\Testbench\TestCase
{
    private function setConfigurationForTests()
    {
        config()->set('youtube_api.api_key', env('API_YOUTUBE_KEY'));
        config()->set('youtube_api.channel_id', env('CHANNEL_ID'));
    }
    /** @test */
    public function it_should_be_list_playlist()
    {
        $this->setConfigurationForTests();

        // Http::fake();
        
        // $client = new Client(new YoutubeDataApi());

        // $result = $client->listChannelVideos()->limit()->get();
        
        dd(config());

    }
}
