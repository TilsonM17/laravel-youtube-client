# Laravel Youtube Client API

> This package is under development, so it is not recommended for use in production.

This package provides a simple and intuitive way to work on the Youtube Data API.
It provides fluent interface to Youtube features.

Objectives to be achieved with this package:

- YouTube Data API v3
  - [x] List video from my channel
  - [ ] List my channel playlist
  - [ ] List video comments on my channel
  - [ ] Provide a new kind of Channel Subscribe Button, more beautiful and elegant

## Installation
> WIP: Here you will find the step to install through Composer

After installing, define in the .env file the environment variables API_YOUTUBE_KEY and CHANNEL_ID, which corresponds to the api key and the ID of your youtube channel
### Instantiate the class

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
