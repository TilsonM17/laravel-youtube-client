<?php

namespace Tilson\YoutubeApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Tilson\YoutubeApi\Client
 */
class Client extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Tilson\YoutubeApi\Client::class;
    }
}