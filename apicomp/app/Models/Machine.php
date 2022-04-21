<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    use FilterModel;

    protected $fillable =[
        "id",
    "name",
    "description",
    "imageUrl",
    "motherboard_id",
    "processor_id",
    "rammemory_id",
    "ramMemoryAmount",
    "graphiccard_id",
    "graphicCardAmount",
    "powersupply_id"
    ];




    public function motherboard(){
        return $this->belongsTo(Motherboard::class);
    }

    public function processor(){
        return $this->belongsTo(Processor::class);
    }

    public function rammemory(){
        return $this->belongsTo(Rammemory::class);
    }

    public function graphiccard(){
        return $this->belongsTo(Graphiccard::class);
    }
    public function powersupply(){
        return $this->belongsTo(Powersupply::class);
    }

    public function storagedevices()
    {
        return $this->belongsToMany(Storagedevice::class, 'storagedevice_machine')->withPivot('amount');
    }

    public function storagedeviceMachine(){
        return $this->hasMany(StoragedeviceMachine::class);
    }




}
