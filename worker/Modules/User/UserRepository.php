<?php

namespace Worker\Modules\User;

use Worker\Shared\Models\User;
use Worker\Shared\Models\UserPdo;

class UserRepository
{
    protected string $databaseDriver = 'eloquent';

    public function all(int $limit = 10): ?array
    {
        $users = null;
        if ($this->databaseDriver == 'pdo') {
            $userModel = new UserPdo;
            $users = $userModel->all($limit);
        } elseif ($this->databaseDriver == 'eloquent') {
            $userModel = new User;
            $users = array_map(function ($item) {
                return (object) $item;
            }, $userModel->all()->toArray());
        }
        return $users;
    }
}