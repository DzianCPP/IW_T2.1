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

    public function &setGetCurl(string $request_uri)
    {
        curl_setopt($this->curlHandler, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($this->curlHandler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curlHandler, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . $_ENV['API_AUTH_TOKEN']
        ]);
        curl_setopt($this->curlHandler, CURLOPT_URL, self::API_BASE_URI . $request_uri);
        return $this->curlHandler;
    }

    public function &setPostCurl(string $request_uri, string $newUserInfo)
    {
        curl_setopt($this->curlHandler, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($this->curlHandler, CURLOPT_HEADER, true);
        curl_setopt($this->curlHandler, CURLOPT_POST, true);
        curl_setopt($this->curlHandler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curlHandler, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . $_ENV['API_AUTH_TOKEN']
        ]);
        curl_setopt($this->curlHandler, CURLOPT_POSTFIELDS, $newUserInfo);
        curl_setopt($this->curlHandler, CURLOPT_URL, self::API_BASE_URI . $request_uri);
        return $this->curlHandler;
    }

    public function &setDeleteCurl(string $request_uri)
    {
        curl_setopt($this->curlHandler, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($this->curlHandler, CURLOPT_HEADER, true);
        curl_setopt($this->curlHandler, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($this->curlHandler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curlHandler, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . $_ENV['API_AUTH_TOKEN']
        ]);
        curl_setopt($this->curlHandler, CURLOPT_URL, self::API_BASE_URI . $request_uri);
        return $this->curlHandler;
    }

    public function &setPatchCurl(string $newRecordInfo, string $requested_uri)
    {
        curl_setopt($this->curlHandler, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($this->curlHandler, CURLOPT_HEADER, true);
        curl_setopt($this->curlHandler, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($this->curlHandler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curlHandler, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer " . $_ENV['API_AUTH_TOKEN'],
            "Content-Type:application/json"
        ]);

        curl_setopt($this->curlHandler, CURLOPT_URL, self::API_BASE_URI . $requested_uri);
        curl_setopt($this->curlHandler, CURLOPT_POSTFIELDS, $newRecordInfo);
        return $this->curlHandler;
    }
}