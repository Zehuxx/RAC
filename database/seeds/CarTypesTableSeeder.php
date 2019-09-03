<?php

use Illuminate\Database\Seeder;
class CarTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('car_types')->insert([
            'id'=>1,
            'name'=>'LUJO',
            'cost'=>6498,
        ]);
        DB::table('car_types')->insert([
            'id'=>2,
            'name'=>'MONTAÑA',
            'cost'=>2498,
        ]);
        DB::table('car_types')->insert([
            'id'=>3,
            'name'=>'TRABAJO',
            'cost'=>1498,
        ]);
        DB::table('car_types')->insert([
            'id'=>4,
            'name'=>'BARRIO',
            'cost'=>3498,
        ]);
    }
}