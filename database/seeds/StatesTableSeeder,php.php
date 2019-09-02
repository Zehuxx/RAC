<?php

use Illuminate\Database\Seeder;
class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            'id'=>1,
            'name'=>'DISPONIBLE',
        ]);
        DB::table('states')->insert([
            'id'=>2,
            'name'=>'NO DISPONIBLE',
        ]);
    }
}