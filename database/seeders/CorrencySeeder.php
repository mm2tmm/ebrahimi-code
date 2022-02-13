<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CorrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            'id' => 1,
            'name' => 'Bitcoin',
            'symbole' => 'btc',
            'fee' => 100,
        ]);

        DB::table('currencies')->insert([
            'id' => 2,
            'name' => 'Ethereum',
            'symbole' => 'eth',
            'fee' => 25,
        ]);

        DB::table('currencies')->insert([
            'id' => 3,
            'name' => 'Tron',
            'symbole' => 'trx',
            'fee' => 10,
        ]);
    }
}
