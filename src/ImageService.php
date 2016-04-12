<?php

namespace App;

use GuzzleHttp\Client;

class ImageService
{
    /** @var Client */
    private $httpClient;

    /**
     * ImageService constructor.
     */
    public function __construct()
    {
        $accessToken = getenv('DROPBOX_ACCESSTOKEN');

        $this->httpClient = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json'
            ]
        ]);
    }

    public function getImageUrls()
    {
        $files = $this->listFiles();
        $images = [];
        foreach ($files as $file) {
            $images[] = $this->getTemporaryLink($file['path_display']);
        }

        return $images;
    }

    private function listFiles($folder = '')
    {
        $data = $this->postJson('https://api.dropboxapi.com/2/files/list_folder', [
            'path' => $folder,
            'recursive' => false,
            'include_media_info' => false,
            'include_deleted' => false
        ]);

        return $data['entries'];
    }

    private function getTemporaryLink($path)
    {
        $data = $this->postJson('https://api.dropboxapi.com/2/files/get_temporary_link', [
            'path' => $path,
        ]);

        return $data['link'];
    }

    /**
     * @param string $url
     * @param array $data
     * @return array
     */
    private function postJson($url, $data)
    {
        $response = $this->httpClient->post($url, [
            'json' => $data
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
