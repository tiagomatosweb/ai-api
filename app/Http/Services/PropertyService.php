<?php

namespace App\Http\Services;

use App\Http\Resources\PropertyResource;
use App\Property;
use App\PropertyAnalytic;
use Illuminate\Support\Str;

class PropertyService
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getProperties()
    {
        $properties = Property::paginate();
        return PropertyResource::collection($properties);
    }

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

    public function getPropertiesSummary($input)
    {
        $propertyIds = !empty($input['type']) && !empty($input['keyword']) ? Property::where($input['type'], $input['keyword'])->pluck('id') : [];

        if (count($propertyIds)) {
            $paQuery = PropertyAnalytic::whereIn('property_id', $propertyIds)->where('value', '<>', '');
            $paMin = $paQuery->min('value');
            $paMax = $paQuery->max('value');
            $paAvg = $paQuery->avg('value');

            $paNoValueCount = PropertyAnalytic::whereIn('property_id', $propertyIds)->whereNull('value')->orWhere('value', '')->count();
            $paValueCount = $paQuery->count();
            $paTotal = PropertyAnalytic::whereIn('property_id', $propertyIds)->count();

            return [
                'data' => [
                    'min_value'                => (float)$paMin,
                    'max_value'                => (float)$paMax,
                    'avg_value'                => (float)$paAvg,
                    'percentage_without_value' => (float)$paNoValueCount / $paTotal * 100,
                    'percentage_with_value'    => (float)$paValueCount / $paTotal * 100,
                ],
            ];
        }

        return [];
    }
}
