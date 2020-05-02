<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
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
            'id'         => (integer)$this->id,
            'guid'       => (string)$this->guid,
            'suburb'     => (string)$this->suburb,
            'state'      => (string)$this->state,
            'country'    => (string)$this->country,
            'created_at' => (string)$this->created_at,
            'updated_at'  => (string)$this->updated_at,
        ];
    }
}
