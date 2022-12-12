<?php

namespace core;

use core\CurlBuilderInterface;

class GorestCurlBuilder implements CurlBuilderInterface
{
    private const API_BASE_URI = "https://gorest.co.in";
    private $curlHandler;

    public function __construct()
    {
        $this->curlHandler = curl_init();
    }

    public function setCurl(string $method, string $endpoint, string $json_body = "")
    {
        curl_setopt($this->curlHandler, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($this->curlHandler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curlHandler, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . $_ENV['API_AUTH_TOKEN'],
            "Content-Type:application/json"
        ]);
        if ($json_body != "") {
            curl_setopt($this->curlHandler, CURLOPT_POSTFIELDS, $json_body);
        }
        if ($method != "GET") {
            curl_setopt($this->curlHandler, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($this->curlHandler, CURLOPT_HEADER, true);
        }
        curl_setopt($this->curlHandler, CURLOPT_URL, self::API_BASE_URI . $endpoint);
        return $this->curlHandler;
    }
}