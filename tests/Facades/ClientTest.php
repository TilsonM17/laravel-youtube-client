<?php

namespace Tests\Facades;

use Tilson\YoutubeApi\Client;
use Tilson\YoutubeApi\Services\YoutubeDataApi;

class ClientTest extends \Orchestra\Testbench\TestCase
{

    /**
    * @test
    */
    public function class_cam_be_instance()
    {
        $object = (new Client(new YoutubeDataApi()));
        $this->assertInstanceOf(Client::class, $object);
    }
}
