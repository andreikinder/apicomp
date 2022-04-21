<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storagedevice extends Model
{
    use HasFactory;

    use FilterModel;

    protected $fillable = ['name', 'imageUrl', 'brand_id',  'storageDeviceType', 'size', 'storageDeviceInterface'];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

}
