<?php

namespace App\Http\Services;

use App\Http\Resources\PropertyAnalyticResource;
use App\Property;
use App\PropertyAnalytic;

class PropertyAnalyticService
{
    /**
     * @param Property $property
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAllPropertyAnalytics(Property $property)
    {
        $propertyAnalytics = $property->analytics;
        $propertyAnalytics->load('property', 'analyticType');

        return PropertyAnalyticResource::collection($propertyAnalytics);
    }

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

    /**
     * @param Property $property
     * @param PropertyAnalytic $propertyAnalytic
     * @param $input
     * @return PropertyAnalyticResource|\Illuminate\Http\JsonResponse
     */
    public function updatePropertyAnalytic(Property $property, PropertyAnalytic $propertyAnalytic, $input)
    {
        if ($propertyAnalytic->property_id !== $property->id) {
            return response()->json([
                'message' => 'The property analytic does not belong to the passed property'
            ], 403);
        }

        $propertyAnalytic->fill($input);
        $propertyAnalytic->save();
        $propertyAnalytic->load('property', 'analyticType');

        return new PropertyAnalyticResource($propertyAnalytic);
    }
}
