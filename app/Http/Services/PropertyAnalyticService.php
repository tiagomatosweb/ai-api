<?php

namespace App\Http\Services;


use App\Http\Resources\PropertyAnalyticResource;
use App\Property;
use App\PropertyAnalytic;

class PropertyAnalyticService
{
    /**
     * @param $input
     * @return PropertyAnalyticResource
     */
    public function createPropertyAnalytic($input)
    {
        $propertyAnalytic = PropertyAnalytic::create($input);
        $propertyAnalytic->load('property', 'analyticType');

        return new PropertyAnalyticResource($propertyAnalytic);
    }

    public function updatePropertyAnalytic(PropertyAnalytic $propertyAnalytic, $input)
    {
        $propertyAnalytic->fill($input);
        $propertyAnalytic->save();
        $propertyAnalytic->load('property', 'analyticType');

        return new PropertyAnalyticResource($propertyAnalytic);
    }
}
