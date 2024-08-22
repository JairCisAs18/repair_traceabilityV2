<?php

namespace App\Http\Controllers;

use App\Models\ModelID;
use App\Models\Parts;
use App\Models\Process;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use SebastianBergmann\CodeUnit\FunctionUnit;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

class PartsController extends Controller
{
   public function readParts(){
      $today = Carbon::now()->toDateString();
      $parts = Parts::select('RNO_ID', 'SNA', 'INIT_DATE', 'PROCESS')->where('INIT_DATE', $today)->whereNull('END_DATE')->orderBy('INIT_DATE')->get();
      $processes = Process::all();
      return view('registered_parts')->with('parts', $parts)->with('processes', $processes);
   }
   
   public function addPart(Request $r){
      $snas = $r->input('snas', []);
      $processes = $r->input('processes', []);
      $snaLength = count($snas);
      $snaParts = Parts::select('SNA')->get();
      $procLength = count($processes);
      if ($snaLength == $procLength){
         for($i = 0; $i < $snaLength; $i++){
            $exists = $snaParts->contains('SNA', $snas[$i]);
            if (!$exists){
               $id = substr($snas[$i], 0 ,4);
               $rno = ModelID::where('SNA_ID', $id)->first();
               $part = new Parts();
               $part->RNO_ID = $rno->id;
               $part->PROCESS = $processes[$i];
               $part->SNA = $snas[$i];
               $part->INIT_DATE = Carbon::now()->toDateString();
               $part->INIT_TIME = Carbon::now()->subHour()->toTimeString();
               $part->save();
            }    
         }
      }
      // foreach ($snas as $sna){
      //    //$serial = $clave->sna;
      //    $id = substr($sna, 0, 4);
      //    $rno = ModelID::where('SNA_ID', $id)->first();
      //    $part = new Parts();
      //    $part->RNO_ID = $rno->id;
      //    $part->PROCESS = $r->process;
      //    $part->SNA = $sna;
      //    $part->INIT_DATE = Carbon::now()->toDateString();
      //    $part->INIT_TIME = Carbon::now()->subHour()->toTimeString();
      //    $part->save();
      // }
      return redirect()->route('main');
   }

   public function readScrapParts(){
      $today = Carbon::now()->toDateString();
      $parts = Parts::select('RNO_ID', 'SNA', 'END_DATE', 'PROCESS')->whereNotNull('END_DATE')->where('SCRAP', 1)->where('END_DATE', $today)->orderBy('END_DATE')->get();
      return view('scrap_parts')->with('parts', $parts);
   }

   public function readRepairedParts(){
      $today = Carbon::now()->toDateString();
      $parts = Parts::select('RNO_ID', 'SNA', 'END_DATE', 'PROCESS')->whereNotNull('END_DATE')->where('REPAIRED', 1)->where('END_DATE', $today)->orderBy('END_DATE')->get();
      return view('repaired_parts')->with('parts', $parts);
   }

   public function addToScrap(Request $r){
      $snas = $r->input('snas', []);
      $snaParts = Parts::select('SNA')->whereNull('END_DATE')->get();
      foreach ($snas as $sna){
         $exists = $snaParts->contains('SNA', $sna);
         if ($exists){
            $part = Parts::where('SNA', $sna)->first();
            $part->END_DATE = Carbon::now()->toDateString();
            $part->END_TIME = Carbon::now()->subHour()->toTimeString();
            $part->SCRAP = 1;
            $part->save();
         } 
      }
      return redirect()->route('scrapParts');
   }

   public function addToRepaired(Request $r){
      $snas = $r->input('snas', []);
      $snaParts = Parts::select('SNA')->whereNull('END_DATE')->get();
      foreach ($snas as $sna){
         $exists = $snaParts->contains('SNA', $sna);
         if ($exists){
            $part = Parts::where('SNA', $sna)->first();
            $part->END_DATE = Carbon::now()->toDateString();
            $part->END_TIME = Carbon::now()->subHour()->toTimeString();
            $part->REPAIRED = 1;
            $part->save();
         }
      }
      return redirect()->route('repairedParts');
   }
}
