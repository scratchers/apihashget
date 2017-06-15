<?php

namespace jpuck;

class ApiHashGet
{
    public function fetchAll(string $api) : string
    {
        $client = new \GuzzleHttp\Client;

        $response = $client->request('GET', "$api/list");

        $list = json_decode($response->getBody(), $array = true)[0]['versions'];

        foreach ($list as $item) {
            $response = $client->request('GET', "$api/$item[hash]");
            $result []= json_decode($response->getBody(), $array = true)[0];
        }

        return json_encode($result ?? []);
    }
}
