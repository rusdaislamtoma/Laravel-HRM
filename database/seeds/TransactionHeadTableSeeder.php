<?php

use Illuminate\Database\Seeder;

class TransactionHeadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('transaction_heads')->insert([
            'type'=>'Income',
            'name' => 'Provident Fund',
            'status' => 'Active'
        ]);
        DB::table('transaction_heads')->insert([
            'type'=>'Expense',
            'name' => 'Salary',
            'status' => 'Active'
        ]);
    }
}
