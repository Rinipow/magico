<?php

namespace App\Services;

use App\Entity\User;

/**
 * Class UserService
 * @package App\Services
 */
class UserService
{
    /**
     * @param User $user
     *
     * @return string
     */
    public function stoCazzo(User $user):string
    {
        return $user->getEmail();
    }
}