<?php

namespace App\Console\Commands;

use App\Models\Country;
use App\Models\State;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class PopulateCountryStateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populate:country';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This populates the database with country and states';

    /**
     * Execute the console command.
     *
     * @return int
     * @throws \Exception
     */
    public function handle()
    {
        if (!Schema::hasTable('countries')) throw new \Exception('Countries table needs to be created');
        if (!Schema::hasTable('states')) throw new \Exception('States table needs to be created');
        if (State::query()->count() > 0){
            $this->info('States and Country Already Populated');
            return Command::SUCCESS;
        }
        $countries = json_decode(file_get_contents('public/countriesandstates.json'));
        foreach ($countries as $country) {
            $states = $country->states;
            $createdCountry = Country::updateOrCreate(
                [
                    'name' => $country->name,
                    'phone_code' => $country->phone_code
                ],
                [
                    'region' => $country->region,
                    'capital' => $country->capital,
                    'flag' => $country->emoji,
                ]
            );
            $this->info('Created '. $createdCountry->name);
            foreach ($states as $state) {
                State::updateOrCreate(
                    [
                        'country_id' => $createdCountry->id,
                        'name' => $state->name],
                    [
                        'state_code' => $state->state_code,
                    ]
                );
            }
            $this->info('Created states for '. $createdCountry->name);
        }
        return Command::SUCCESS;
    }
}
