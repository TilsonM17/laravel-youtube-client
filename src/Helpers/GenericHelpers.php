<?php

namespace Tilson\YoutubeApi\Helpers;

use Exception;
use ReflectionClass;

class GenericHelpers
{
    /**
     * Validate the config file
     * @return array
     * @throws Exception
     */
    public static function validateConfig(): array
    {
        if (config('youtube_api.api_key') === null || config('youtube_api.channel_id') === null)
            throw new Exception('Please set your API Key and Channel ID in the config file');

        return [config('youtube_api.api_key'),config('youtube_api.channel_id')];
    }

    public static function getAllProperties(object $class)
    {
        $reflect = new ReflectionClass($class);
        $reflectionProperties = $reflect->getProperties();
        $ownProps = [];
        foreach ($reflectionProperties as $prop)
            $ownProps[$prop->getName()] = $reflect->getProperty($prop->getName())->getValue($class);

        return $ownProps;
    }
}
