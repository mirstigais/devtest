<?php

namespace App\Services\User;

use App\Models\User;

class UserService
{
    /**
     * @var User
     */
    protected User $userModel;

    /**
     * @param User $userModel
     */
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    /**
     * @return array
     */
    public function list(): array
    {
        return $this->userModel->list()->toArray();
    }

    /**
     * @param string $id
     * @return array
     */
    public function getUserById(string $id)
    {
        return $this->userModel->getUserById($id);
    }
}
