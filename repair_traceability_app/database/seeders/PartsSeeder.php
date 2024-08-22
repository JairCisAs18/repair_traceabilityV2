<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('parts_to_repair')->insert([
            'RNO_ID'=>'10',
            'PROCESS'=>1,
            'SNA'=>'M11WA2305150020',
            'INIT_DATE'=>Carbon::create(2024, 06, 10)->format('Y-m-d'),
            'INIT_TIME'=>'11:57:30'
            // 'END_DATE'=>Carbon::now()->format('Y-m-d'),
            // 'REPAIRED'=>1,
            // 'SCRAP'=>0
        ]);
    }
}
