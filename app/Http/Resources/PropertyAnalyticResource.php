<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyAnalyticResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'           => (integer)$this->id,
            'property'     => new PropertyResource($this->whenLoaded('property')),
            'analyticType' => new AnalyticTypeResource($this->whenLoaded('analyticType')),
            'value'        => (string)$this->value,
            'created_at'   => (string)$this->created_at,
            'updated_at'   => (string)$this->updated_at,
        ];
    }
}
