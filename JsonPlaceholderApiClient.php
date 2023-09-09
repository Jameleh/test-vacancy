<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

class JsonPlaceholderApiClient
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://jsonplaceholder.typicode.com/',
            'timeout'  => 2.0,
            'verify'   => false,
        ]);
    }

    public function getUsers()
    {
        $response = $this->client->get('users');
        return json_decode($response->getBody(), true);
    }

    public function getUserPosts($userId)
    {
        $response = $this->client->get("posts?userId=$userId");
        return json_decode($response->getBody(), true);
    }

    public function getUserTasks($userId)
    {
        $response = $this->client->get("todos?userId=$userId");
        return json_decode($response->getBody(), true);
    }

    public function getPost($postId)
    {
        $response = $this->client->get("posts/$postId");
        return json_decode($response->getBody(), true);
    }

    public function addPost($data)
    {
        $response = $this->client->post('posts', ['json' => $data]);
        return json_decode($response->getBody(), true);
    }

    public function editPost($postId, $data)
    {
        $response = $this->client->put("posts/$postId", ['json' => $data]);
        return json_decode($response->getBody(), true);
    }

    public function deletePost($postId)
    {
        $this->client->delete("posts/$postId");
    }
}
