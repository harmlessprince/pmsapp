<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\Company;
use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = Company::all();
        foreach ($companies as $company) {

            Site::factory(rand(2, 5))->make([
                'created_by' => 1,
                'company_id' => $company->id,
            ])->each(function ($site) use ($company) {
                $site_inspector = User::factory()->create([
                    'company_id' => $company->id
                ]);
                $site_inspector->assignRole(RoleEnum::SITE_INSPECTOR->value);

                $site->inspector_id = $site_inspector->id;
                $site->save();
                $site_inspector->site_id = $site->id;
                $site_inspector->save();
            });
        }
    }
}
