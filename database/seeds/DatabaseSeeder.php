<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PersonsTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CarTypesTableSeeder::class);
        $this->call(CarBrandsTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(ModelsTableSeeder::class);
        $this->call(OrderTypesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
    }
    
}
