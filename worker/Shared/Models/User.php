<?php

namespace Worker\Shared\Models;


class User extends BaseModelEloquent
{
    protected $table = 'users';

    protected $fillable = [
        'first_name',
        'last_name'
    ];
}