<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GraphiccardResource extends JsonResource
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
            'memorySize' => $this->memorySize,
            'memoryType' => $this->memoryType,
            'supportMultiGpu' => $this->supportMultiGpu
        ];
    }
}
