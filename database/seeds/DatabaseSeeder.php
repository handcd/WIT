<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Account',
            'email' => 'wit@witplanner.com.mx',
            'password' => bcrypt('WhateverItTakes2017'),
        ]);
        $this->call(CamposTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(ComandaTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(OrderTableSeeder::class);
    }
}
