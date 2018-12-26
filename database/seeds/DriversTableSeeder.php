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
        $driver = App\Driver::create([
            'name' => 'Nadzmi',
            'tel' => '+6011-10849181'
        ]);

        App\Car::create([
            'driver_id' => $driver->id,
            'model' => 'Perodua Myvi',
            'color' => 'Green',
            'plate_no' => 'KDH 1726'
        ]);

        $driver = App\Driver::create([
            'name' => 'Idzham',
            'tel' => '+6011-92837284'
        ]);

        App\Car::create([
            'driver_id' => $driver->id,
            'model' => 'Proton Iriz',
            'color' => 'Red',
            'plate_no' => 'VAC 8737'
        ]);

        $driver = App\Driver::create([
            'name' => 'Imran',
            'tel' => '+6011-74839402'
        ]);

        App\Car::create([
            'driver_id' => $driver->id,
            'model' => 'Honda Civic',
            'color' => 'Gray',
            'plate_no' => 'BMB 2716'
        ]);
    }
}
