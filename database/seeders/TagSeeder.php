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
            Tag::factory(rand(8, $site->maximum_number_of_tags))->create([
                'created_by' => 1,
                'company_id' => $site->company_id,
                'site_id' => $site->id
            ]);
        }
    }
}
