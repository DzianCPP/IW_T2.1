<?php

namespace core\application;
use Dotenv\Dotenv;
use Exception;

class DotEnver
{
    /**
     * @throws Exception
     */
    public static function getDotEnv(): array
    {
        if (!file_exists(BASE_PATH . ".env")) {
            throw new Exception("No .env file");
        }

        $dotenv = Dotenv::createImmutable(BASE_PATH);
        $dotenv->safeLoad();

        return $_ENV;
    }
}