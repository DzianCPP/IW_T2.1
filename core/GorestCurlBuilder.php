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

    public function executeCurl(string $method, $id = 0, $json_body = "")
    {
        $this->setCurl($method, $id, $json_body);
        return curl_exec($this->curlHandler);
    }

    public function setCurl(string $method, $id = 0, $json_body = "")
    {
        curl_setopt_array($this->curlHandler, options: [
            CURLOPT_FRESH_CONNECT => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer " . $_ENV['API_AUTH_TOKEN'],
                "Content-Type:application/json"
            ]
        ]);

        $this->setBody($json_body);
        $this->setCustomMethod($method);
        $this->setEndpoint($id);
        return $this->curlHandler;
    }

    private function setBody(string $json_body): void
    {
        if ($json_body != "") {
            curl_setopt($this->curlHandler, CURLOPT_POSTFIELDS, $json_body);
        }
    }

    private function setCustomMethod(string $method): void
    {
        if ($method != "GET") {
            curl_setopt($this->curlHandler, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($this->curlHandler, CURLOPT_HEADER, true);
        }
    }

    private function setEndpoint(int $id = 0): void
    {
        $endpoint = self::API_BASE_URI . self::API_ENDPOINT;
        
        if ($id != 0 ) {
            $endpoint .= (string)$id;
        }
        curl_setopt($this->curlHandler, CURLOPT_URL, $endpoint);
    }
}
