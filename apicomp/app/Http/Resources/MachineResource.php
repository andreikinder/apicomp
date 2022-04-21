<?php

namespace App\Http\Resources;

use App\Models\Storagedevice;
use Illuminate\Http\Resources\Json\JsonResource;

class MachineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'imageUrl' => $this->imageUrl,
            'motherboard' => MotherboardResource::make($this->motherboard),
            'processor' => ProcessorResource::make($this->processor),
            'rammemory' => RammemoryResource::make($this->rammemory),
            'ramMemoryAmount' => $this->ramMemoryAmount,
            'graphiccard' => GraphiccardResource::make( $this->graphiccard),
            'graphicCardAmount' => $this->graphicCardAmount,
            'powersupply' => PowersupplyResource::make( $this->powersupply),
            'storagedevices' => StoragedeviceMachineResource::collection($this->storagedevices),  //StoragedeviceResouce::collection($this->storagedevices),
        ];
    }
}
