<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnalyticTypeResource extends JsonResource
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
            'id'                 => (integer)$this->id,
            'name'               => (string)$this->name,
            'units'              => (string)$this->units,
            'is_numeric'         => (boolean)$this->is_numeric,
            'num_decimal_places' => (integer)$this->num_decimal_places,
            'created_at'         => (string)$this->created_at,
            'updated_at'         => (string)$this->updated_at,
        ];
    }
}
