<?php

namespace App\Repositories;

use App\DataAccess\Eloquent\User;

class UserRepository implements UserRepositoryInterface
{
    public function getByName($username) : User
    {
        return User::where('name', $username)->first();
    }
}