<?php

header('Content-Type: application/json');

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

$json = __DIR__."/json/$uri.json";

if (!file_exists($json)) {
    die(json_encode([]));
}

die(file_get_contents($json));
