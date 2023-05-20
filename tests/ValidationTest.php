<?php

namespace Tests;

use Illuminate\Support\Facades\App;
use \Tilson\YoutubeApi\Client;
use \Tilson\YoutubeApi\Enums\OrderBy;
use Tilson\YoutubeApi\Providers\YoutubeApiServiceProvider;

class ValidationTest extends \Orchestra\Testbench\TestCase
{

    public function test_a()
    {
        self::assertTrue(true);
    }
}
