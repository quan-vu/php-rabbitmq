<?php

namespace App\Modules\User;

use App\Shared\Models\User;

class UserRepository
{
    // TODO: Task 01: Create singleton for database connection
    // TODO: Task 02: CRUD User
    /*public function all(int $limit = 10): array
    {
        return array_map(function ($i) {
            return [
                'id' => $i,
                'name' => "User $i"
            ];
        }, range(1, 15));
    }*/

    public function all(int $limit = 10): array
    {
        $user = new User;
        return $user->all($limit);
    }
}