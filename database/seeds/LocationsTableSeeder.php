<?php

use Illuminate\Database\Seeder;
class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            'id'=>1,
            'location_code'=>'AB89',
            'availability'=>1,
        ]);
        DB::table('locations')->insert([
            'id'=>2,
            'location_code'=>'BS29',
            'availability'=>1,
        ]);
        DB::table('locations')->insert([
            'id'=>3,
            'location_code'=>'KA92',
            'availability'=>1,
        ]);
        DB::table('locations')->insert([
            'id'=>4,
            'location_code'=>'KS43',
            'availability'=>1,
        ]);
        DB::table('locations')->insert([
            'id'=>5,
            'location_code'=>'LD93',
            'availability'=>1,
        ]);
        DB::table('locations')->insert([
            'id'=>6,
            'location_code'=>'MD00',
            'availability'=>1,
        ]);
    }
}