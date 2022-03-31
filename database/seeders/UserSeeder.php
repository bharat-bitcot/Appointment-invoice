<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('users')->count() == 0){
            //Update default entry
            DB::table('users')->insert([
                'email'		 => 'admin@gmail.com',
                'password' 	 => bcrypt('admin'),
                'role_id'    => 1,
                'first_name' => 'Admin',
                'last_name'  => 'Admin',
                'status'     => 1
            ]);
        } else {
            echo "Users is not empty, therefore NOT ";
        }
    }
}
