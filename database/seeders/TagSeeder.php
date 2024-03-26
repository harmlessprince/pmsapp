<?php

namespace Database\Seeders;

use App\Models\Site;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sites = Site::all();
        foreach ($sites as $site) {
            $count = rand(8, $site->maximum_number_of_tags);
            for ($i = 0; $i < $count; $i++) {
                Tag::factory()->create([
                    'created_by' => 1,
                    'company_id' => $site->company_id,
                    'site_id' => $site->id,
                    'code' => generateTagCode($site->id, $site->company_id)
                ]);
            }

        }
    }
}
