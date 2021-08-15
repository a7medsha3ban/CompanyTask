<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Ahmed Shaaban',
            'email'=>'a7medsha3ban43@gmail.com',
            'password'=>Hash::make('12345'),
            'phone'=>'01158665252',
            'is_admin'=>'1',
            'company_id'=>'1',
        ]);
    }
}
