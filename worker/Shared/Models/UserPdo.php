<?php

namespace Worker\Shared\Models;

class UserPdo extends BaseModelPdo
{
    protected string $table = 'users';

    public int $id;
    public string $first_name;
    public string $last_name;
}