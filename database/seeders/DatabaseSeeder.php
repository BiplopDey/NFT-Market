<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instant;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory([
            'email'=>'admin@admin.com',
            'name' => 'Admin',
            'isAdmin' => true,
        ])->create();

        $user = User::factory([
            'email'=>'dey@dey.com',
            'name' => 'dey',
        ])->create();

        User::factory(10)->create();
        Instant::factory()->create([
            "title" => 'Hola',
            "img" => 'https://helpx.adobe.com/content/dam/help/en/photoshop/using/convert-color-image-black-white/jcr_content/main-pars/before_and_after/image-before/Landscape-Color.jpg',
            "user_id" => $user->id,
        ]);
        $instant = Instant::factory(10)->create();

        $user->loves()->attach($instant);
    }
}
