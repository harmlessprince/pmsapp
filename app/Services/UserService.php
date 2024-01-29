<?php

namespace App\Services;

use App\Models\Company;
use App\Models\User;
use App\Repositories\Eloquent\Repository\UserRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function __construct(
        private readonly UserRepository $userRepository,
    )
    {
    }

    public function createUser(
        string  $first_name, string $last_name,
        string  $password, ?string $email = null,
        bool    $status = true,
        ?string $username = null
    ): User
    {

        /** @var User */
        return $this->userRepository->create([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'password' => Hash::make($password),
            'status' => $status,
            'email' => $email,
            'username' => $username,
        ]);

    }

    public function associateUserToRole(User $user, string $role)
    {
        $user->assignRole($role);
    }

    public function associateUserToComapany(User $user, Company $company)
    {
        $user->company_id = $company->id;
        $user->save();
    }

}
