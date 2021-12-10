<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instant;

class InstantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Instant::factory(10)->create();
        //Instant::factory(10)->create();
    }
}
