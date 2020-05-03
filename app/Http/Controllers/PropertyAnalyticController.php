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
     * @param PropertyAnalyticCreateRequest $request
     * @return \App\Http\Resources\PropertyAnalyticResource
     */
    public function create(PropertyAnalyticCreateRequest $request)
    {
        $input = $request->validated();
        return $this->propertyAnalyticService->createPropertyAnalytic($input);
    }

    /**
     * @param PropertyAnalytic $propertyAnalytic
     * @param PropertyAnalyticUpdateRequest $request
     * @return \App\Http\Resources\PropertyAnalyticResource
     */
    public function update(PropertyAnalytic $propertyAnalytic, PropertyAnalyticUpdateRequest $request)
    {
        $input = $request->validated();
        return $this->propertyAnalyticService->updatePropertyAnalytic($propertyAnalytic, $input);
    }
}
