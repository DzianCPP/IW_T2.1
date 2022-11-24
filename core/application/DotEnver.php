<?php

namespace core\application;
use Dotenv\Dotenv;

class DotEnver
{
    public static function getDotEnv(): array
    {
        $dotenv = Dotenv::createImmutable(BASE_PATH);
        $dotenv->safeLoad();
        return $_ENV;
    }
}