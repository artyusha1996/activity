<?php

use Illuminate\Database\Seeder;

class CreateActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Entities\Activity::class, 10)->create([
            'city_id' => factory(\App\Entities\City::class)->create()->id,
        ]);
    }
}
