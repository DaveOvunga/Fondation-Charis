<?php

require 'vendor/autoload.php';

use Vimeo\Vimeo;

class VimeoAPI
{
    private $client;

    public function __construct($clientId, $clientSecret, $accessToken)
    {
        $this->client = new Vimeo($clientId, $clientSecret);
        $this->client->setToken($accessToken);
    }

    public function uploadVideo($filePath, $title, $description)
    {
        // Upload video
        $uri = $this->client->upload($filePath, [
            'name' => $title,
            'description' => $description,
            'chunk_size' => 5242880 // 5MB chunks
        ]);

        return $uri;
    }

    public function getVideoUrl($uri)
    {
        return $this->client->request($uri)['body']['link']; // Get the video URL
    }

    public function getTranscodingStatus($uri)
    {
        return $this->client->request($uri . '?fields=transcode.status');
    }

    public function updateVideo($uri, $title, $description)
    {
        return $this->client->request($uri, [
            'method' => 'PATCH',
            'body' => [
                'name' => $title,
                'description' => $description,
            ],
        ]);
    }

    public function deleteVideo($uri)
    {
        return $this->client->request($uri, [
            'method' => 'DELETE',
        ]);
    }
}
