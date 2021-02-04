<?php

use Illuminate\Database\Seeder;
use App\Models\Media;
use App\Models\Schedule;
use Faker\Factory as Faker;

class ScheduleSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('schedules')->delete();

        echo "[Schedule] Seeding 'schedules' table\n";

        Schedule::create([
            'name' => 'Escola Dominical',
            'week_day' => Schedule::SUNDAY,
            'time_start' => '09:00',
            'time_end' => '11:00'
        ]);

        Schedule::create([
            'name' => 'Culto da Família',
            'week_day' => Schedule::SUNDAY,
            'time_start' => '19:00',
            'time_end' => '20:00'
        ]);

        Schedule::create([
            'name' => 'Rede de Jovens',
            'week_day' => Schedule::SATURDAY,
            'time_start' => '19:00',
            'time_end' => '20:00'
        ]);

        Schedule::create([
            'name' => 'Rede da Oração',
            'week_day' => Schedule::WEDNESDAY,
            'time_start' => '19:00',
            'time_end' => '20:00'
        ]);
    }
}
