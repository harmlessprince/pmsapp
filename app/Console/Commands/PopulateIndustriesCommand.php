<?php

namespace App\Console\Commands;

use App\Models\Industry;
use Illuminate\Console\Command;

class PopulateIndustriesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populate:industries';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate Industries Into the Database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Populating Industries');
        if (Industry::query()->count() > 0){
            $this->info('Industries Populated');
            return Command::SUCCESS;
        }
        $this->info('Populating Industries');
        $industries = [
            "Construction",
            "Security",
            "Manufacturing",
            "Entertainment",
            "Agriculture",
            "Education",
            "Food",
            "Health Care",
            "Technology",
            "Advertising/Marketing",
            "Finance",
            "Fashion",
            "Real Estate"
        ];

        foreach ($industries as $industry){
            Industry::query()->updateOrCreate([
                "name" => $industry
            ]);
            $this->info('Created '. $industry);
        }
        $this->info('Industries Populated');
    }
}
