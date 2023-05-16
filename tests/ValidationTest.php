<?php

namespace Tests;

class ValidationTest extends \Orchestra\Testbench\TestCase
{
    /**
     * @test
     */
    public function validateIfExistConfigurationKey()
    {

        dd( config('youtube_api.api_youtube_key'));
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('API Key or Channel API is not set');
        
        \Tilson\YoutubeApi\Helpers\ValidationHelper::validateConfig();
    }

    /**
     * @test
     */
    public function validateIfReturnArrayOfKey()
    {   
        $arrayOfKey = \Tilson\YoutubeApi\Helpers\ValidationHelper::validateConfig();

         $this->assertIsArray($arrayOfKey);
    }
}
