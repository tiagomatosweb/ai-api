<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyAnalyticCreateRequest;
use App\Http\Services\PropertyAnalyticService;
use App\Property;
use Illuminate\Http\Request;

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
     * @param PropertyAnalyticCreateRequest $request
     */
    public function create(Property $property, PropertyAnalyticCreateRequest $request)
    {
        $input = $request->validated();
        return $this->propertyAnalyticService->createPropertyAnalytic($property, $input);
    }
}
