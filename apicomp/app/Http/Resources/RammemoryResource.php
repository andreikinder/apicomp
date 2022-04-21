<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RammemoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request) {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'imageUrl' => $this->imageUrl,
            'brand' => BrandResource::make($this->brand),
            'size' => $this->size,
            'rammemorytype' => RammemorytypeResource::make($this->rammemorytype),
            'frequency' => $this->frequency,
        ];

    }
}
