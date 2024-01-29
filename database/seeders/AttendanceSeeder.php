<?php

namespace Database\Seeders;

use App\Enums\AttendanceActionTypeEnum;
use App\Enums\RoleEnum;
use App\Models\Attendance;
use App\Models\Company;
use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sites = Site::with('company')->get();
        $start = Carbon::parse("2023-09-01");
        $end = Carbon::parse("2024-01-31");
        $totalSites = $sites->count();
        $this->command->info('Total number of sites: ' . $sites->count());
        $differenceInDays = $start->diffInDays($end);
        $this->command->info('Each site will be seeded data for: ' . $differenceInDays . ' Days');
        $this->command->info('You might want to go play');

        foreach ($sites as $site) {

            User::factory(10)->create()->each(function ($user) use ($site) {
                $user->assignRole(RoleEnum::SECURITY->value);
                $user->company_id = $site->company->id;
                $user->site_id = $site->id;
                $user->save();
            });
            $this->command->info('Creating sample attendances for: ' . $site->name);
            for ($date = $start; $date->lte($end); $date->addDay()) {

                $start = Carbon::parse("2023-09-01");
                $end = Carbon::parse("2024-01-31");

                $distance = rand(30, 200);


                $randomTime = Carbon::createFromTime(
                    rand(8, 10), // Hour
                    rand(0, 59), // Minute
                    rand(0, 59)  // Second
                );
                $combinedDateTime = $date->format('Y-m-d') . ' ' . $randomTime->format('H:i:s');
                $users = User::query()->where('site_id', $site->id)->get();
                foreach ($users as $user){
                    Attendance::factory()->create([
                        'company_id' => $site->company_id,
                        'site_id' => $site->id,
                        'user_id' => $user->id,
                        'action_type' => AttendanceActionTypeEnum::CHECK_IN->value,
                        'proximity' =>  fake()->randomElement(['close', 'not close', 'far']),
                        'distance' => $distance,
                        'attendance_date' => $date,
                        'attendance_time' => $randomTime->format('H:i:s'),
                        'attendance_date_time' => $combinedDateTime
                    ]);
                    if (rand(0, 1)){
                        Attendance::factory()->create([
                            'company_id' => $site->company_id,
                            'site_id' => $site->id,
                            'user_id' => $user->id,
                            'action_type' => AttendanceActionTypeEnum::CHECK_OUT->value,
                            'proximity' =>  fake()->randomElement(['close', 'not close', 'far']),
                            'distance' => $distance,
                            'attendance_date' => $date,
                            'attendance_time' => $randomTime->addHours(rand(8, 9))->format('H:i:s'),
                            'attendance_date_time' => $combinedDateTime
                        ]);
                    }

                }


            }

        }

    }

}
