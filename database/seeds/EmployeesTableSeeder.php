<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'id'=>2,
            'salary'=>40000,
        ]);
        DB::table('employees')->insert([
            'id'=>1,
            'salary'=>40000,
        ]);
    }
}