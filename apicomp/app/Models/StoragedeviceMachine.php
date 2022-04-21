<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoragedeviceMachine extends Model
{
    use HasFactory;

    protected string $table = 'storagedevice_machine';
    protected  $fillable = ['storagedevice_id', 'machine_id', 'amount'];

    protected $primaryKey = ['storagedevice_id', 'machine_id'];

    public $incrementing = false;

    public function storagedevice(){
        return $this->belongsTo(Storagedevice::class,'storagedevice_id', 'id' );
    }
}
