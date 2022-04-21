<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graphiccard extends Model
{
    use HasFactory;

    use FilterModel;

    protected $fillable =
        ['name',
        'imageUrl',
        'brand_id',
        'memorySize',
        'memoryType',
        'minimumPowerSupply',
        'supportMultiGpu'];


    public function brand(){
        return $this->belongsTo(Brand::class);
    }


}
