<?php

namespace Tilson\YoutubeApi\Contract;

interface IYoutubeDataApi
{
    public function searchVideosInMyChannel(array $params = []);

    public function searchPlaylistInMyChannel(array $params = []);
}