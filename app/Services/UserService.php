<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser(array $data): User
    {
        $data['password'] = bcrypt($data['password']);
        return $this->userRepository->create($data);
    }

    public function updateUser(User $user, array $data): User
    {
        // Update user attributes
        $user->name = $data['name'];
        $user->email = $data['email'];

        // Only update password if it's provided in the data
        if (isset($data['password']) && !empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        $user->category = $data['category'];
        $user->role_id = $data['role_id'];

        $user->save();

        return $user;
    }

    public function deleteUser(User $user): ?bool
    {
        return $user->delete();
    }
}
