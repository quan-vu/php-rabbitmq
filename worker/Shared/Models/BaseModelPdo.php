<?php

namespace Worker\Shared\Models;

use Worker\Shared\Databases\Pdo\PdoDatabase;

abstract class BaseModelPdo
{
    protected string $table;
    protected string $model;

    public function all(int $limit = 10): array
    {
        $query = "SELECT * FROM {$this->table} LIMIT {$limit}";
        return PdoDatabase::query($query, get_class($this));
    }
}