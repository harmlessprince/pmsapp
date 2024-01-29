<?php

namespace Database\Seeders;

use App\Models\Scan;
use App\Models\Tag;
use Database\Factories\ScanFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ScanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::with('site')->get();
        $start = Carbon::parse("2023-09-01");
        $end = Carbon::parse("2024-01-31");
        $totalTags = $tags->count();
        $this->command->info('Total number of tags: ' . $tags->count());
        $differenceInDays = $start->diffInDays($end);
        $this->command->info('Each tag will be seeded data for: ' . $differenceInDays . ' Days');
        $this->command->info('You might want to go play');
        $tagsLeft = $totalTags;
        foreach ($tags as $tag) {
            $start = Carbon::parse("2023-09-01");
            $end = Carbon::parse("2024-01-31");
            $this->command->info('Creating sample scans for: ' . $tag->name);
            $distance = rand(30, 200);
            $tagsLeft = $tagsLeft - 1;

            for ($date = $start; $date->lte($end); $date->addDay()) {
                $randomTime = Carbon::createFromTime(
                    rand(8, 23), // Hour
                    rand(0, 59), // Minute
                    rand(0, 59)  // Second
                );
                $combinedDateTime = $date->format('Y-m-d') . ' ' . $randomTime->format('H:i:s');
                Scan::factory(rand(8, $tag->site->maximum_number_of_rounds))->create([
                    'company_id' => $tag->company_id,
                    'site_id' => $tag->site->id,
                    'tag_id' => $tag->id,
                    'scanned_by' => $tag->site->inspector_id,
                    'proximity' => fake()->randomElement(['close', 'not close', 'far']),
                    'distance' => $distance,
                    'scan_date' => $date,
                    'scan_time' => $randomTime->format('H:i:s'),
                    'scan_date_time' => $combinedDateTime
                ]);
            }
            $this->command->info('Created sample scans for: ' . $tag->name);
            $percentage = ($tagsLeft / $totalTags) * 100;
            $this->command->info(round(100 - $percentage, 2) . ': Done ');

        }
    }
}
