<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProcessorResource extends JsonResource
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
            'cores' => $this->cores,
            'baseFrequency' => $this->baseFrequency,
            'maxFrequency' => $this->maxFrequency,
            'cacheMemory' => $this->cacheMemory,
            'tdp' => $this->tdp,

        ];

    }
}
