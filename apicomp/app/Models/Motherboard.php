<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motherboard extends Model
{
    use HasFactory;

    use  FilterModel;

    protected $fillable = ["id" , "name", "imageUrl", "brand_id", "sockettype_id",    "rammemorytype_id",
    "ramMemorySlots", "maxTdp","sataSlots", "m2Slots", "pciSlots" ];



    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function sockettype(){
        return $this->belongsTo(Sockettype::class);
    }
    public function rammemorytype(){
        return $this->belongsTo(Rammemorytype::class);
    }


}
