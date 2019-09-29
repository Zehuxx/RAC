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
               'home_address'=>'Amapala',
               'phone'=>'9874-6373',
               'identification_card'=>'0304-1998-00231',
               'gender'=>'M',
           ]);
        DB::table('persons')->insert([
            'id'=>2,
            'name'=>'user',
            'last_name'=>'perez',
            'birth_date'=>Carbon::parse('2000-01-01'),
            'home_address'=>'Tegucigalpa',
            'phone'=>'9874-6373',
            'identification_card'=>'0801-1998-00211',
            'gender'=>'M',
        ]);
        DB::table('persons')->insert([
            'id'=>3,
            'name'=>'Juan',
            'last_name'=>'Soler',
            'birth_date'=>Carbon::parse('2019-09-11'),
            'home_address'=>'Esquias',
            'phone'=>'9837-4828',
            'identification_card'=>'0305-1995-00221',
            'gender'=>'M',
        ]);
        DB::table('persons')->insert([
            'id'=>4,
            'name'=>'Luis',
            'last_name'=>'Ruiz',
            'birth_date'=>Carbon::parse('2019-09-22'),
            'home_address'=>'El porvenir',
            'phone'=>'9893-9483',
            'identification_card'=>'0504-1995-00131',
            'gender'=>'M',
        ]);
        
    } 
}