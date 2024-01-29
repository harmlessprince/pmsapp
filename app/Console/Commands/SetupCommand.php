<?php

namespace App\Console\Commands;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SetupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:app';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup Application';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting Setup');
        if (env('APP_ENV') != "production") {
            $this->call("migrate:fresh");
        }
        $this->info('Populate country');
        $this->call("populate:country");
        $this->info('Populate roles');
        $this->call("populate:roles");

        $this->call("populate:industries");


        $this->info('Populate users');



        $superAdmin = User::query()->updateOrCreate(
            [
                "username" => env('SUPER_ADMIN_EMAIL'),
                "email" => env('SUPER_ADMIN_EMAIL'),
            ],
            [
                "password" => Hash::make(env('SUPER_ADMIN_PASSWORD')),
                "first_name" => 'Super',
                "last_name" => 'Admin',
                "email_verified_at" => now()
            ]
        );
        $superAdmin->assignRole(RoleEnum::SUPER_ADMIN->value);


        $admin = User::query()->updateOrCreate(
            [
                "username" => env('ADMIN_EMAIL'),
                "email" => env('ADMIN_EMAIL'),
            ],
            [
                "password" => Hash::make(env('ADMIN_PASSWORD')),
                "first_name" => "Regular",
                "last_name" => 'Admin',
                "email_verified_at" => now()
            ]
        );
        $admin->assignRole(RoleEnum::ADMIN->value);
//        $admin->a
        $company_owner = User::query()->updateOrCreate(
            [
                "username" => env('COMPANY_OWNER_EMAIL'),
                "email" => env('COMPANY_OWNER_EMAIL'),
            ],
            [
                "password" => Hash::make(env('COMPANY_OWNER_PASSWORD')),
                "first_name" => 'Company',
                "last_name" => 'Owner',
                "email_verified_at" => now()
            ]
        );
        $company_owner->assignRole(RoleEnum::COMPANY_OWNER->value);

        $inspector = User::query()->updateOrCreate(
            [
                "username" => env('SITE_INSPECTOR_EMAIL'),
                "email" => env('SITE_INSPECTOR_EMAIL'),
            ],
            [
                "password" => Hash::make(env('SITE_INSPECTOR_PASSWORD')),
                "first_name" => 'Site',
                "last_name" => 'Inspector',
                "email_verified_at" => now()
            ]
        );
        $inspector->assignRole(RoleEnum::SITE_INSPECTOR->value);

        if (env('APP_ENV') != "production") {

            $this->info('Seeding Users');
            $this->call("db:seed", [
                '--class' => 'UserSeeder',
            ]);
            $this->info('Seeding Sites');
            $this->call("db:seed", [
                '--class' => 'SiteSeeder',
            ]);
            $this->info('Seeding Tags');
            $this->call("db:seed", [
                '--class' => 'TagSeeder',
            ]);
            $this->info('Seeding Scans');
            $this->call("db:seed", [
                '--class' => 'ScanSeeder',
            ]);
        }


        $this->info('Setup Completed');
    }
}
