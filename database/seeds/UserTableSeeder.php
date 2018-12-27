<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'type' => 'Admin',
            'employee_id' => 'EMP'.time(),
            'department_id' => 1,
            'designation_id' => 1,
            'name' =>'Abdul Rahim',
            'contact_no' =>'+8801766890987',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin123'),
            'status' =>'Active'

        ]);
    }
}
