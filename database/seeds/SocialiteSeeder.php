<?php

use Illuminate\Database\Seeder;

class SocialiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Socialite::class,12)->create();

    }
}
