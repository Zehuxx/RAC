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
               'gender'=>'M',
           ]);
        DB::table('persons')->insert([
            'id'=>2,
            'name'=>'user',
            'last_name'=>'perez',
            'birth_date'=>Carbon::parse('2000-01-01'),
            'home_address'=>'tegus',
            'phone'=>'98746373',
            'identification_card'=>'tarjeta de identidad',
            'gender'=>'M',
        ]);
        DB::table('persons')->insert([
            'id'=>3,
            'name'=>'Juan',
            'last_name'=>'Soler',
            'birth_date'=>Carbon::parse('2019-09-11'),
            'home_address'=>'Esquias',
            'phone'=>'98374828',
            'identification_card'=>'jwsdiw233jk',
            'gender'=>'M',
        ]);
        DB::table('persons')->insert([
            'id'=>4,
            'name'=>'Luis',
            'last_name'=>'Ruiz',
            'birth_date'=>Carbon::parse('2019-09-22'),
            'home_address'=>'El porvenir',
            'phone'=>'003032',
            'identification_card'=>'odooew',
            'gender'=>'M',
        ]);
        
    } 
}