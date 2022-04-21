<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Powersupply extends Model
{
    use HasFactory;

    use FilterModel;

    protected $fillable = ['name','imageUrl','brand_id','potency','badge80Plus' ];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }


}
