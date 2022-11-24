<?php

namespace core\models;

class Validator
{
    private string $nameRegEx = "/^[a-z ,.'-]+$/i";

    public function makeDataSafe(array $data): array
    {
        $userData = [];
        $keys = array_keys($data);
        $i = 0;
        foreach ($data as $dataElement) {
            $userData[$keys[$i]] = $this->makeStringSafe($dataElement);
            ++$i;
        }

        return $userData;
    }

    private function makeStringSafe($data): string
    {
        $data = trim($data);
        $data = stripslashes($data);

        return htmlspecialchars($data);
    }

    public function userDataValid(string $email, string $fullName): bool
    {
        if (!$this->nameValid($fullName) || !$this->emailValid($email)) {
            return false;
        }

        return true;
    }

    private function emailValid(string $email): bool
    {
        if (empty($email)) {
            return false;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }

    private function nameValid(string $fullName): bool
    {
        $firstName = substr($fullName, 0, strpos($fullName, " ", 0));
        $lastName = ltrim(substr($fullName, strpos($fullName, " ", 0), strlen($fullName)));

        if (!preg_match($this->nameRegEx, $firstName) || !preg_match($this->nameRegEx, $lastName)) {
            return false;
        }

        return true;
    }
}