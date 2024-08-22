<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModelID;
use App\Models\Process;

class Parts extends Model
{
    use HasFactory;
    protected $table = 'PARTS_TO_REPAIR';
    public $timestamps = False;
    
    public function getRNO(){
        $rno = ModelID::find($this->RNO_ID);
        return $rno->RNO;
    }

    public function getProcess(){
        $process = Process::find($this->PROCESS);
        return $process->PROCESS_NAME;
    }
}
