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
            throw new Exception();
        }

        $dotenv = Dotenv::createImmutable(BASE_PATH);
        $dotenv->safeLoad();

        return $_ENV;
    }
}