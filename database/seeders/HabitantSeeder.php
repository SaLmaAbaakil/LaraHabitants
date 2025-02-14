<?php

namespace Database\Seeders;

use App\Models\Habitant;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HabitantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Habitant::factory(50)->create();
    }
}
