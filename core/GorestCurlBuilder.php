<?php

namespace core;

use core\CurlBuilderInterface;

class GorestCurlBuilder implements CurlBuilderInterface
{
    private const API_BASE_URI = "https://gorest.co.in";
    private const API_ENDPOINT = "/public/v2/users/";
    private $curlHandler;

    public function __construct()
    {
        $this->curlHandler = curl_init();
    }

    public function __destruct()
    {
        curl_close($this->curlHandler);
    }

    public function executeCurl(string $method, $id = 0, $json_body = "") {
        $this->setCurl($method, $id, $json_body);
        return curl_exec($this->curlHandler);
    }

    public function setCurl(string $method, $id = 0, $json_body = "")
    {
        curl_setopt($this->curlHandler, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($this->curlHandler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curlHandler, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . $_ENV['API_AUTH_TOKEN'],
            "Content-Type:application/json"
        ]);

        $endpoint = self::API_BASE_URI . self::API_ENDPOINT;
        if ($id != 0 ) {
            $endpoint .= (string)$id;
        }

        if ($json_body != "") {
            curl_setopt($this->curlHandler, CURLOPT_POSTFIELDS, $json_body);
        }
        if ($method != "GET") {
            curl_setopt($this->curlHandler, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($this->curlHandler, CURLOPT_HEADER, true);
        }
        curl_setopt($this->curlHandler, CURLOPT_URL, $endpoint);
        return $this->curlHandler;
    }
}