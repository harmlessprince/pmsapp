<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws \ReflectionException
     */
    public function run(): void
    {
        User::factory(10)->create()->each(function ($user) {
            $user->assignRole(RoleEnum::COMPANY_OWNER->value);
            $company = Company::factory()->make();
            $user->company()->save($company);
            $user->company_id = $user->company->id;
            $user->save();
        });
    }
}
