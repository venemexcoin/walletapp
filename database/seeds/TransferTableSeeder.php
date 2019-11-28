<?php

use Illuminate\Database\Seeder;

class TransferTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transfers')->insert([[
            'description'  => 'Salary',
            'amount'       => '4800',
            'criptoamount' => '4.01545689',
            'wallet_id'    => 1,
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ], [
            'description'  => 'Renta',
            'amount'       => '-400',
            'criptoamount' => '-0.01545689',
            'wallet_id'    => 1,
            'created_at'  => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]]);
    }
}
