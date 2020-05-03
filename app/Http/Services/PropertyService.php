<?php

namespace App\Http\Services;


use App\Http\Resources\PropertyResource;
use App\Property;
use Illuminate\Support\Str;

class PropertyService
{
    /**
     * @param $input
     * @return PropertyResource
     */
    public function createProperty($input)
    {
        $input['guid'] = Str::uuid();
        $property = Property::create($input);

        return new PropertyResource($property);
    }
}
