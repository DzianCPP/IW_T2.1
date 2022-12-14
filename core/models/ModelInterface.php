<?php

namespace core\models;

interface ModelInterface
{
    public function get(int|string $value = NULL): array;
    public function update(array $newInfo): bool;
    public function create(): bool;
    public function delete(int ...$ids): bool;
}