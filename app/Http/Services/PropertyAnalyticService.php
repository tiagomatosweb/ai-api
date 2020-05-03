<?php

namespace App\Http\Services;


use App\Http\Resources\PropertyAnalyticResource;
use App\Property;

class PropertyAnalyticService
{
    /**
     * @param Property $property
     * @param $input
     * @return PropertyAnalyticResource
     */
    public function createPropertyAnalytic(Property $property, $input)
    {
        $propertyAnalytic = $property->analytics()->create($input);
        $propertyAnalytic->load('property', 'analyticType');

        return new PropertyAnalyticResource($propertyAnalytic);
    }
}
