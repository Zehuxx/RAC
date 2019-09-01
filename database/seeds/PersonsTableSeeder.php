<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class PersonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('persons')->insert([
               'id'=>1,
               'name'=>'admin',
               'last_name'=>'lopez',
               'birth_date'=>Carbon::parse('2000-01-01'),
               'home_address'=>'tegus',
               'phone'=>'98746373',
               'identification_card'=>'tarjeta de identidad',
               'gender'=>'m',
           ]);
        DB::table('persons')->insert([
            'id'=>2,
            'name'=>'user',
            'last_name'=>'perez',
            'birth_date'=>Carbon::parse('2000-01-01'),
            'home_address'=>'tegus',
            'phone'=>'98746373',
            'identification_card'=>'tarjeta de identidad',
            'gender'=>'m',
        ]);
        
    }
}