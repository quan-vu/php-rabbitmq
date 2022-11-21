<?php

namespace App\Shared\Models;

class User extends BaseModelPdo
{
    protected string $table = 'users';
//    protected string

    public int $id;
    public string $first_name;
    public string $last_name;
}