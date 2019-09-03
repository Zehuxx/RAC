<?php

use Illuminate\Database\Seeder;

class CarTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('car_types')->insert([
            'id' =>1,
            'name' => 'SUV',
            'cost' => 1200000,
        ]);
    }
}
