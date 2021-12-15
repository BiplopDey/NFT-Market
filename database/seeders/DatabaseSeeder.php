<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instant;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        Instant::factory()->create([
            "title" => 'Hola',
            "img" => 'https://helpx.adobe.com/content/dam/help/en/photoshop/using/convert-color-image-black-white/jcr_content/main-pars/before_and_after/image-before/Landscape-Color.jpg',
        ]);
        Instant::factory(10)->create();
    }
}
