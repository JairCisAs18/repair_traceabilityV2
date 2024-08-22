<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('PROCESSES')->insert([['PROCESS_NAME'=>'SMT A'] , ['PROCESS_NAME'=>'SMT B'], ['PROCESS_NAME'=>'FLUJO'], ['PROCESS_NAME'=>'ICT'], ['PROCESS_NAME'=>'PERFORMANCE']]);
    }
}
