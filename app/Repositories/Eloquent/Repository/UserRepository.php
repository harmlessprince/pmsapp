<?php

namespace App\Repositories\Eloquent\Repository;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function findByEmail(string $email): ?Model
    {
        return $this->model->query()->where('email', $email)->first();
    }

    public function findByRole(int $id, string $role): ?Model
    {
        return $this->model->query()
            ->where('id', $id)
            ->whereHas('roles', function ($query) use ($role) {
                $query->where('name', $role);
            })->first();
    }

    public function filter()
    {

    }
}

