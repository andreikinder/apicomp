<?php

namespace App\Http\Controllers;

use App\Models\Motherboard;
use App\Models\Processor;
use App\Models\Rammemory;
use Illuminate\Http\Request;

class VerifyCompatibilityController extends Controller
{
    public function isSocketCompatibility(Motherboard $mb, Processor $pr){
        $m_socket  = $mb->sockettype->id;
        $p_socket  = $pr->sockettype->id;

        if ($m_socket == $p_socket ) return true;
        else return false;
    }

    public function isRamTypeCompatibility(Motherboard $mb, Rammemory $rm){
        $m_ram_type  = $mb->rammemorytype->id;
        $rm_ram_type  = $rm->rammemorytype->id;

        if ($m_ram_type == $rm_ram_type ) return true;
        else return false;
    }

    public function verify(Request $request){


        $validated = $request->validate([
            "motherboard_id" => 'required|exists:motherboards,id',
            "powersupply_id" => 'required|exists:powersupplies,id',
        ]);

        $mb_id = $request->input('motherboard_id') ?? false;

        $motherbord = null;
        if ($mb_id){
            $motherbord = Motherboard::findOrFail($mb_id);
        }

        $errors = [];


        $pr_id = $request->input('processor_id') ?? false;
        if ($pr_id){
            $processor = Processor::findOrFail($pr_id);

           $isSocket =  $this->isSocketCompatibility( $motherbord , $processor);

           if ($isSocket == false ){
               $errors['socketype'] =  'Sockets are not compatibility. Processor socket is ' .$processor->sockettype->name .
                   '. Motherboard socket is ' .  $motherbord->sockettype->name .'.';
           }

        }

        $ram_id = $request->input('rammemory_id') ?? false;

        if ($ram_id) {
            $rammemory = Rammemory::find($ram_id);
            $isRamType = $this->isRamTypeCompatibility($motherbord, $rammemory);

            if ($isRamType == false ){
                $errors['rammemorytype'] =  'Rammemorytype  are not compatibility. Rammemory rammemorytype is ' .$rammemory->rammemorytype->name .
                    '. Motherboard rammemorytype is ' .  $motherbord->rammemorytype->name .'.';
            }
        }



        if ($errors ) return response()->json([
            'message' => 'Machine is invalid',
            'valid' => 'false',
            'errors' => $errors

        ])->setStatusCode(400);

        return response()->json([
            'message' => 'Machine is valid',
            'valid' => 'true',
        ]);

    }
}
