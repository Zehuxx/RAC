<?php

use Illuminate\Database\Seeder;
class MovementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movements')->insert([
            'id'=>1,
            'name'=>'MANTENIMIENTO',
        ]);
        DB::table('movements')->insert([
            'id'=>2,
            'name'=>'ROBO',
        ]);
        DB::table('movements')->insert([
            'id'=>3,
            'name'=>'SALIDA',
        ]);
        DB::table('movements')->insert([
            'id'=>4,
            'name'=>'ENTRADA',
        ]);
    }
}