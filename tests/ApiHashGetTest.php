<?php

use PHPUnit\Framework\TestCase;
use jpuck\ApiHashGet;

class ApiHashGetTest extends TestCase
{
    public function test_gets_all_documents()
    {
        $given = <<<JSON
[
    {
        "versions": [
            {
                "version": "1.0",
                "hash": "15ac8f7dfcef3f3b9b3b5a48a7bee327"
            },
            {
                "version": "1.1",
                "hash": "5990bf1b3f11225d970c5d266e77e641"
            }
        ]
    }
]
JSON;

        $expected = <<<JSON
[
    {
        "id": "1",
        "name": "Example1",
        "type": "version",
        "version": "1.0",
        "file_name": "testfile1.txt",
        "hash": "15ac8f7dfcef3f3b9b3b5a48a7bee327"
    },
    {
        "id": "2",
        "name": "Example2",
        "type": "version",
        "version": "1.1",
        "file_name": "testfile2.txt",
        "hash": "5990bf1b3f11225d970c5d266e77e641"
    }
]
JSON;

        $endpoint = WEB_SERVER_HOST.':'.WEB_SERVER_PORT;
        // or use https://example.com/api

        $api = new ApiHashGet($endpoint);

        $actual = $api->fetchAll($given);

        $this->assertJsonStringEqualsJsonString($expected, $actual);
    }
}
