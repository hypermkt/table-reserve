<?php

namespace App\Repositories;

use App\DataAccess\Eloquent\User;

interface UserRepositoryInterface
{
    public function getByName($username): User;
}