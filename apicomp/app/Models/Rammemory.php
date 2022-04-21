<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rammemory extends Model
{
    use HasFactory;

    use FilterModel;

    protected $fillable = [
        'id', 'name',  'imageUrl', 'brand_id',
        'size', 'rammemorytype_id', 'frequency'
    ];
    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function rammemorytype(){
        return $this->belongsTo(Rammemorytype::class);
    }



}
