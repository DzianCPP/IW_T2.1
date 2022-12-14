<?php

namespace core;

interface CurlBuilderInterface
{
    public function setCurl(string $method, int $id = 0, string $json_body = "");
}