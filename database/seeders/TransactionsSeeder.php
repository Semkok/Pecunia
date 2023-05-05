<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactionseeder = [
            [
                'user_id' => 1,
                'amount' => 2,
                'description' => 'ok',
                'category_id' => '1'

            ]
        ];
        foreach($transactionseeder as $key => $value){
            Transaction::create($value);
        }
    }
}
