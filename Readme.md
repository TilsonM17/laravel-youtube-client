## Laravel Youtube API

This package is a wrapper for the Youtube Data API v3. It provides a fluent interface to the Youtube resources.

Objetivos desse pacote:

- [x] Listar uma playlist com as thumbnail dos videos(Incorporar os videos).
- [V] Listar videos do meu canal.
- [x] Listar playlist do meu canal
- [x] Listar os Comentarios de um video
- [x] Estilizar o Botão de inscrição do Youtube(É muito feio o botão padrão)


### Listar Videos do canal

```php

use \Tilson\YoutubeApi\Client;
use \Tilson\YoutubeApi\Enums\OrderBy;

$client = new Cliente();
$client->lisChannelVideos()
->order(OrderBy::DATE)
->limit(10);
->get();

```

### Listar Playlists do canal

```php

use \Tilson\YoutubeApi\Client;
use \Tilson\YoutubeApi\Enums\OrderBy;

$client = new Client()->listChannelPlaylists();

```
