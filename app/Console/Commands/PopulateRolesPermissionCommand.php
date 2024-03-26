<?php

namespace App\Console\Commands;

use App\Enums\RoleEnum;
use App\Models\Industry;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class PopulateRolesPermissionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populate:roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate Roles and Permissions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (Role::query()->count() > 0){
            $this->info('Roles Populated');
            return Command::SUCCESS;
        }
        $roles = [
            [
                "name" => RoleEnum::SUPER_ADMIN->value,
                'status' => false,
            ],

            [
                "name" => RoleEnum::ADMIN->value,
                'status' => true,
            ],
            [
                "name" => RoleEnum::COMPANY_OWNER->value,
                'status' => true,
            ],
            [
                "name" => RoleEnum::RESELLER->value,
                'status' => true,
            ],
            [
                "name" => RoleEnum::SITE_INSPECTOR->value,
                'status' => true,
            ],
            [
                "name" => RoleEnum::PERSONNEL->value,
                'status' => false,
            ]
        ];
        foreach ($roles as $role){
            $this->info($role['name']);
            Role::query()->updateOrCreate([
                'name' => $role['name'],
                'guard_name' => 'web'
            ]);
        }
    }
}
