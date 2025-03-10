<?php

namespace Database\Seeders;

use App\Models\Time;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $times = ['08:00', '09:30', '11:00', '12:30', '14:00', '15:30', '17:00', '18:0', '20:00'];

        foreach ($times as $time) {
            Time::create(['time' => $time]);
        }
    }
}
