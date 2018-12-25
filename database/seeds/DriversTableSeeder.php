<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DriversTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $driver = App\Driver::create([
            'name' => $faker->name,
            'tel' => $faker->randomDigit
        ]);

        App\Car::create([
            'driver_id' => $driver->id,
            'model' => $faker->domainName,
            'color' => str_random(10),
            'plate_no' => str_random(10)
        ]);
    }
}
