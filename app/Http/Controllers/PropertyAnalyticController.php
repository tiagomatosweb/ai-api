<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyAnalyticCreateRequest;
use App\Http\Requests\PropertyAnalyticUpdateRequest;
use App\Http\Services\PropertyAnalyticService;
use App\Property;
use App\PropertyAnalytic;

class PropertyAnalyticController extends Controller
{
    private $propertyAnalyticService;

    /**
     * PropertyAnalyticController constructor.
     * @param PropertyAnalyticService $propertyAnalyticService
     */
    public function __construct(PropertyAnalyticService $propertyAnalyticService)
    {
        $this->propertyAnalyticService = $propertyAnalyticService;
    }

    /**
     * @param Property $property
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Property $property)
    {
        return $this->propertyAnalyticService->getAllPropertyAnalytics($property);
    }

    /**
     * @param Property $property
     * @param PropertyAnalyticCreateRequest $request
     * @return \App\Http\Resources\PropertyAnalyticResource
     */
    public function create(Property $property, PropertyAnalyticCreateRequest $request)
    {
        $input = $request->validated();
        return $this->propertyAnalyticService->createPropertyAnalytic($property, $input);
    }

    /**
     * @param Property $property
     * @param PropertyAnalytic $propertyAnalytic
     * @param PropertyAnalyticUpdateRequest $request
     * @return \App\Http\Resources\PropertyAnalyticResource
     */
    public function update(Property $property, PropertyAnalytic $propertyAnalytic, PropertyAnalyticUpdateRequest $request)
    {
        $input = $request->validated();
        return $this->propertyAnalyticService->updatePropertyAnalytic($property, $propertyAnalytic, $input);
    }
}
