<?php

namespace core;

interface CurlBuilderInterface
{
    public function setCurl(string $method, string $endpoint, string $json_body = "");
}