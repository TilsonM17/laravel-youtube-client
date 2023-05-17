<?php

namespace Tilson\YoutubeApi\Enums;


enum OrderBy : string{
    public const ORDER_BY_DATE = 'date';
    public const ORDER_BY_RATING = 'rating';
    public const ORDER_BY_RELEVANCE = 'relevance';
    public const ORDER_BY_TITLE = 'title';
    public const ORDER_BY_VIDEO_COUNT = 'videoCount';
    public const ORDER_BY_VIEW_COUNT = 'viewCount';
}