<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'id'=>3,
        ]);
        DB::table('customers')->insert([
            'id'=>4,
        ]);
    }
}