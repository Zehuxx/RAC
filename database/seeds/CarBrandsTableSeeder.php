<?php

use Illuminate\Database\Seeder;
class CarBrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('car_brands')->insert([
            'id'=>1,
            'name'=>'TOYOTA',
        ]);
        DB::table('car_brands')->insert([
            'id'=>2,
            'name'=>'KIA',
        ]);
        DB::table('car_brands')->insert([
            'id'=>3,
            'name'=>'FORD',
        ]);
        DB::table('car_brands')->insert([
            'id'=>4,
            'name'=>'NISSAN',
        ]);
    }
}