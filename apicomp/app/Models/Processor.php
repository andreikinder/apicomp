<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processor extends Model
{
    use HasFactory;

    use FilterModel;

    protected $fillable = ['name',  'imageUrl', 'brand_id',  'sockettype_id', 'cores', 'baseFrequency', 'maxFrequency', 'cacheMemory', 'tdp' ];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function sockettype(){
        return $this->belongsTo(Sockettype::class);
    }


}
