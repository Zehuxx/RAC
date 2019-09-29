<?php

use Illuminate\Database\Seeder;
class ModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('models')->insert([
            'id'=>1,
            'name'=>'COROLLA',
        ]);
        DB::table('models')->insert([
            'id'=>2,
            'name'=>'PICANTO',
        ]);
        DB::table('models')->insert([
            'id'=>3,
            'name'=>'YARIS',
        ]);
        DB::table('models')->insert([
            'id'=>4,
            'name'=>'FIESTA',
        ]);
        DB::table('models')->insert([
            'id'=>5,
            'name'=>'MICRA',
        ]);
        DB::table('models')->insert([
            'id'=>6,
            'name'=>'HILUX',
        ]);
    }
}