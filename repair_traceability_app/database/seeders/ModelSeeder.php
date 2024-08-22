<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('models')->insert([['RNO'=>'R16-8481', 'SNA_ID'=>'REAR'], ['RNO'=>'R16-B013', 'SNA_ID'=>'DGH9'], ['RNO'=>'R16-B016', 'SNA_ID'=>'DGJ4'], ['RNO'=>'R16-8483', 'SNA_ID'=>'DASH'], ['RNO'=>'R16-B060', 'SNA_ID'=>'BGBL'], ['RNO'=>'R16-B064', 'SNA_ID'=>'BGBS'], ['RNO'=>'R16-B089', 'SNA_ID'=>'VA55'], ['RNO'=>'R16-B160', 'SNA_ID'=>'VC67'],['RNO'=>'R16-B162', 'SNA_ID'=>'VC85'], ['RNO'=>'R16-B178', 'SNA_ID'=>'M11W']]);
        
    }
}
