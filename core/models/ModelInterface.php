<?php

namespace core\models;

interface ModelInterface
{
    public function insert(array $params, array $fields, string $tableName): bool;
    public function selectAll(string $tableName): array;
    public function getRecordBy(string $colName, $value, string $tableName): array;
    public function update(string $tableName, array $fields, array $params, $colName): bool;
    public function delete(string $colName, array $values, string $tableName): bool;
}