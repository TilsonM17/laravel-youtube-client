# Laravel Youtube Client



This package provides a simple and intuitive way to work on the Youtube Data API.
It provides fluent interface to Youtube features.

Objectives to be achieved with this package:

- YouTube Data API v3
  - [x] List video from my channel
  - [x] List my channel playlist
  - [x] Show channel subscription button

## Installation
```shell
  composer require tilson/laravel-youtube-client
```

After installing, define in the .env file the environment variables API_YOUTUBE_KEY and CHANNEL_ID, which corresponds to the api key and the ID of your youtube channel

Publish the package:
```shell
php artisan vendor:publish --provider="Tilson\YoutubeApi\Providers\YoutubeApiServiceProvider"
```

In your `app.php` register our service provider.
```php
    // config/app.php
    'providers' => ServiceProvider::defaultProviders()->merge([
        // ...
       Tilson\YoutubeApi\Providers\YoutubeApiServiceProvider::class,
       
       // ...
    ])->toArray(),
```
### Use the client class

```php

use \Tilson\YoutubeApi\Client;

$client = app(Client::class);
//or Injecting Dependency
public function __construct(private Client $client)
{
// you code
}

```
### List video from my channel

```php

use \Tilson\YoutubeApi\Client;
use \Tilson\YoutubeApi\Enums\OrderBy;

$client->lisChannelVideos()
->order(OrderBy::DATE)
->limit(10);
->get();
```

### List playlist from my channel

```php
use \Tilson\YoutubeApi\Client;

$client->listPlaylists()->limit(10)->get();

```
### Show subscription button

```html
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @youtubeScriptButton() <--- Add This
        <title>Laravel</title>
    </head>
    <body class="antialiased">
       @youtubeButton()   <--- Add This (Show the Button)
    </body>
</html>

```
In the youtube_api.php file you can change some settings for the button.


## Contributing

Thank you for considering contributing to the Laravel framework! Please feel free to contribute your PR and report issues.

## License

This package is open-sourced software licensed under the MIT.