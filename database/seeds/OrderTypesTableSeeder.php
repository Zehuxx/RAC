<?php

use Illuminate\Database\Seeder;
class OrderTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_types')->insert([
            'id'=>1,
            'name'=>'MANTENIMIENTO',
        ]);
        DB::table('order_types')->insert([
            'id'=>2,
            'name'=>'SALIDA',
        ]);
        DB::table('order_types')->insert([
            'id'=>3,
            'name'=>'ROBO',
        ]);
        DB::table('order_types')->insert([
            'id'=>4,
            'name'=>'ENTRADA',
        ]);
    }
}