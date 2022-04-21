<?php

namespace App\Http\Resources;

use App\Models\Sockettype;
use Illuminate\Http\Resources\Json\JsonResource;

class MotherboardResource extends JsonResource
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
            'brand' => BrandResource::make($this->brand),
            'sockettype' => SockettypeResource::make($this->sockettype),
            'rammemorytype' => RammemorytypeResource::make($this->rammemorytype),
            'ramMemorySlots' => $this->ramMemorySlots,
            'maxTdp' => $this->maxTdp,
            'sataSlots' => $this->sataSlots,
            'm2Slots' => $this->m2Slots,
            'pciSlots' => $this->pciSlots,
        ];

    }
}
