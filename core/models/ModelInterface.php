<?php

namespace core\models;

interface ModelInterface
{
    public function getUsers(array $columnValue = []): array;
    public function update(array $newInfo): bool;
    public function create(): bool;
    public function delete(array $columnValues = [], string $column = "", mixed $value = NULL): bool;
}