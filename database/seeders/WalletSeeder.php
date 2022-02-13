<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wallets')->insert([
            'id' => '1',
            'address' => '123456',
            'balance' => 8937834823428923468324565345435000000000000000000000000000000000,
        ]);

    }
}
