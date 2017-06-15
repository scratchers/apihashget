<?php

namespace jpuck;

class ApiHashGet
{
    protected $endpoint;

    public function __construct(string $endpoint)
    {
        $this->endpoint = $endpoint;
    }

    public function fetchAll(string $json) : string
    {
        $list = json_decode($json, $array = true)[0]['versions'];

        $client = new \GuzzleHttp\Client;

        foreach ($list as $item) {
            $response = $client->request('GET', "{$this->endpoint}/$item[hash]");
            $result []= json_decode($response->getBody(), $array = true)[0];
        }

        return json_encode($result ?? []);
    }
}
