<?php

$jsonString = <<<EOD
{
    "apiVersion": "2.1",
    "videos": [
    {
        "id": "253",
        "category": "Music",
        "title": "Jingle Bells",
        "duration": 457,
        "viewCount": 88270796
    },
    {
        "id": "253",
        "category": "Music",
        "title": "Jingle Bells",
        "duration": 457,
        "viewCount": 58270796
    },
    {
        "id": "253",
        "category": "Music",
        "title": "Jingle Bells",
        "duration": 457,
        "viewCount": 270796
    }
    ]
}
EOD;

echo getViewCount($jsonString);

function getViewCount($jsonString)
{
    $videoData = json_decode($jsonString,true);
    $viewCount = 0;
    $videoList = $videoData['videos'];

    foreach($videoList as $videoInfo)
    {
        $viewCount += $videoInfo['viewCount'];
    }

    return $viewCount;
}