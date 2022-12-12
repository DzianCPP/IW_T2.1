<?php

namespace core\models;

interface ModelInterface
{
    public function getUsers(array $fieldValue = []): array;
    public function update(array $newInfo, array $fieldValue = []): bool;
    public function create(): bool;
    public function delete(array $fieldValues = []): bool;
}